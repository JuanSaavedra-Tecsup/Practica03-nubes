@extends('layouts.app')
@section('title','Buscar Contacto')
@section('content')
<div class="container">
    <div class="alert alert-primary" role="alert">
    BUSCAR CONTACTO
    </div>
    <hr>
    <form class="input-group mb-3 form-inline my-2 my-lg-0" role="search" action="{{url('home/searchredirect')}}">
<input class="form-control" type="text" title="Escriba el email del contacto" name='search' placeholder="Buscar por email">
<div class="input-group-append">
<button class="btn btn-outline-secondary btn-outline-success" type="submit" title="Buscar por email">Buscar</button>
</div>
</form>

<br>
</div>

@endsection