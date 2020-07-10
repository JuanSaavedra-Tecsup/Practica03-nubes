@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Acciones</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    <b>Nombre: </b> {{ Auth::user()->name }}
                    <br>
                    <b>Email: </b> {{ Auth::user()->email }}
                    <br>
                    <b>Registrado con: </b> {{ Auth::user()->provider }}
                    <hr>
                    <a href="{{ route('contact.index') }}" class="btn btn-success">Contactos</a>
                    <a href="{{ route('contact.index') }}" class="btn btn-warning">Buscar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
