<?php

namespace App\Http\Controllers;

use JD\Cloudder\Facades\Cloudder;
use App\Contacto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestContacto;
use Illuminate\Support\Facades\Storage;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos = Contacto::all();
        return view('contacto.index')->with('contactos', $contactos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestContacto $request)
    {
        $this->validate($request,[
            'imagen'=>'mimes:jpeg,bmp,jpg,png|between:1, 6000',
        ]);

        $contactos=request()->except('_token');
        if($request->hasFile('imagen')){
            $contactos = $request->file('imagen');
            $name = $request->file('imagen')->getClientOriginalName();
            $imagen = $request->file('imagen')->getRealPath();;
            Cloudder::upload($imagen, null);
            list($width, $height) = getimagesize($imagen);
            $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
            //save to uploads directory         
            $contactos->move(public_path("uploads"), $name);
            //Save images           
            $this->saveImages($request, $image_url);

            //$contactos['imagen']=$request->file('imagen')->store('uploads','public');
        }

        //Contacto::insert($contactos);
        return redirect()->route('contact.index');
        //$contactos = Contacto::create($request->all());
        //return redirect()->route('contact.index');
    }

    public function saveImages(Request $request, $image_url)
   {
       $contactos=request()->except('_token');

       $contactos = new Contacto();
       $contactos->nombre = $request->nombre;
       $contactos->apellido = $request->apellido;
       $contactos->email = $request->email;
       $contactos->fecha_nacimiento = $request->fecha_nacimiento;
       $contactos->imagen = $request->file('imagen')->getClientOriginalName();
       $contactos->image_url = $image_url;
       $contactos->save();

       //Contacto::create($contactos->all());
       //Contacto::insert($contactos);
        return redirect()->route('contact.index');
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contactos=Contacto::find($id);
        return view('contacto.edit')->with('contactos', $contactos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(RequestContacto $request, $id)
    {
        $datosContactos=request()->except(['_token','_method']);
        if($request->hasFile('imagen')){
            //$contactos = Contacto::all();
            $contactos = Contacto::findOrFail($id);
            Storage::delete('public/'.$contactos->imagen);
            $datosContactos['imagen']=$request->file('imagen')->store('uploads','public');
        }
        Contacto::where('id','=',$id)->update($datosContactos);
        $contactos = Contacto::findOrFail($id);
        return view('contacto.edit', compact('contactos'));
        //return view('contacto.edit')->with('contactos', $contactos);

        //$contactos=Contacto::find($id);
        //$contactos->nombre=$request->nombre;
        //$contactos->apellido=$request->apellido;
        //$contactos->email=$request->email;
        //$contactos->fecha_nacimiento=$request->fecha_nacimiento;
        //$contactos->imagen=$request->imagen;
        //$contactos->save();
        //return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contactos= Contacto::find($id);
        $contactos->delete();
        return back();
    }

}
