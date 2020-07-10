@extends('layouts.app')
@section('title','Crear Contacto')
@section('content')
<div class="container">
<div class="alert alert-primary" role="alert">
            CREAR CONTACTO
          </div>
          <hr>
          {!! Form::open(['route' => 'contact.store', 'role'=>'form', 'enctype'=>'multipart/form-data', 'method'=>'post']) !!}
  				{{ csrf_field() }}
          <div class="form-row">
            <div class="form-group col-md-12">
              {!! Form::label('Nombre') !!}
              {!! Form::text('nombre', '', ['class'=>'form-control', 'required', 'autofocus']) !!}
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              {!! Form::label('Apellido') !!}
              {!! Form::text('apellido', '', ['class'=>'form-control', 'required']) !!}
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              {!! Form::label('Email') !!}
              {!! Form::email('email', '', ['class'=>'form-control', 'required']) !!}
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              {!! Form::label('Fecha de Nacimiento') !!}
              {!! Form::date('fecha_nacimiento', '', ['class'=>'form-control', 'required']) !!}
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              {!! Form::label('Imagen') !!}
              <input type="file" class="form-control" name="imagen">
            </div>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
              <label class="form-check-label" for="invalidCheck3">
                ¿Está de acuerdo con los datos ingresados?
              </label>
            </div>
          </div>
          <a href="{{ route('contact.index') }}" class="btn btn-secondary">Atras</a>
          <button type="submit" class="btn btn-success">Crear</button>
        </div>
        {!! Form::close() !!}
      <br>
</div>
@endsection