@extends('layouts.app')
@section('title','Contacto Encontrado')
@section('content')
<div class="container">
    <div class="alert alert-primary" role="alert">
    CONTACTO ENCONTRADO
    </div>
    <hr>
    @foreach ($contactos as $contactosc)
    {{ $contactosc->nombre}}
    <br>
    {{ $contactosc->apellido}}
    <br>
    {{ $contactosc->email}}
    <br>
    @endforeach
<br>
</div>

@endsection