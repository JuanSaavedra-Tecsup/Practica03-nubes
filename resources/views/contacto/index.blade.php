@extends('layouts.app')
@section('title','Lista de Contactos')
@section('content')
<div class="container">
<div class="alert alert-primary" role="alert">
            LISTA DE CONTACTOS
          </div>
          <hr>
          <a class="btn btn-primary" href="{{ route('contact.create') }}">Nuevo Contacto</a>
          <hr>
          @if(count($contactos)>0)
          <div class="table-responsive-sm">
          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Fecha de Nacimiento</th>
                <th>Imagen</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($contactos as $contactosc)
              <tr>
                <td>{{ $contactosc->id }}</td>
                <td>{{ $contactosc->nombre }}</td>
                <td>{{ $contactosc->apellido }}</td>
                <td>{{ $contactosc->email }}</td>
                <td>{{ $contactosc->fecha_nacimiento }}</td>
                <td>
                    <img img-responsive src="{{asset('uploads/'.$contactosc->imagen)}}" width="150">
                </td>
                <td>
                  <a href="{{ route('contact.edit', $contactosc->id) }}" class="btn btn-warning btn-sm" title="Editar">Editar</a>
                </td>
                <td>
                  <form action="{{ route('contact.destroy', $contactosc->id) }}" method="post" style="display:inline">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger btn-sm" title="Eliminar" onclick="return confirm('¿Deseas eliminar este contacto?')">Eliminar</button>
            </form>
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
          </div>
          @else
      <div class="jumbotron jumbotron-fluid">
      <div class="container">
      <h1 class="display-4"><center>No hay datos.</center></h1>
      </div>
      </div>
      @endif
      <br>
</div>
@endsection