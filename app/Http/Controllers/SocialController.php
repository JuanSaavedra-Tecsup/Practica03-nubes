<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\User;
use App\Contacto;
use App\Http\Requests\RequestContacto;
use Illuminate\Support\Facades\Storage;
use Auth;
use Hash;
use DB;

class SocialController extends Controller
{
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider){
        $getInfo = Socialite::driver($provider)->user();

        $user = $this->createUser($getInfo,$provider);

        auth()->login($user);

        return redirect()->to('/home');
    }

    function createUser($getInfo,$provider){
        $user = User::where('provider_id', $getInfo->id)->first();

        if (!$user){
            $user = User::create([
                'name' => $getInfo->name,
                'email' => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id,
            ]);
        }
        return $user;
    }

    public function search($search){
        $search = urldecode($search);
    
        $contactos = Contacto::select('contactos.nombre','contactos.apellido','contactos.email')
        ->where('contactos.email','=',$search)
        ->get();
    
        $existencia = Contacto::select('contactos.email')
        ->where('contactos.email','=',$search)
        ->get();
    
        if (count($existencia) >= 1) {
          if (count($contactos) == 0){
            return view('encontrado')
            ->with('message', 'No hay resultados que mostrar')
            ->with('search', $search);
          } else{
            return view('encontrado')
            ->with('contactos', $contactos)
            ->with('search', $search);
          }
        }else{
          return redirect()->back();
        }
    }
}
