@extends('layouts.app')
@section('title','Editar Contacto')
@section('content')
<div class="container">
    <div class="alert alert-primary" role="alert">
    EDITAR CONTACTO
    </div>
    <hr>
    {!! Form::model($contactos, array('route'=>['contact.update', $contactos->id], 'method'=>'put')) !!}
{{ csrf_field() }}
{{ method_field('PATCH') }}
<div class="form-row">
  <div class="form-group col-md-12">
    {!! Form::label('Id') !!}
    {!! Form::number('id', $contactos->id, ['class'=>'form-control', 'disabled']) !!}
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-12">
    {!! Form::label('Nombre') !!}
    {!! Form::text('nombre', $contactos->nombre, ['class'=>'form-control', 'required', 'autofocus']) !!}
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-12">
    {!! Form::label('Apellido') !!}
    {!! Form::text('apellido', $contactos->apellido, ['class'=>'form-control', 'required']) !!}
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-12">
    {!! Form::label('Email') !!}
    {!! Form::text('email', $contactos->email, ['class'=>'form-control', 'required']) !!}
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-12">
    {!! Form::label('Fecha de Nacimiento') !!}
    {!! Form::date('fecha_nacimiento', $contactos->fecha_nacimiento, ['class'=>'form-control', 'required']) !!}
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-12">
    {!! Form::label('Imagen') !!}
    <img img-responsive src="{{asset('uploads/'.$contactos->imagen)}}" width="150">
    <br>
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
{!! Form::submit('Guardar', ['class'=>'btn btn-success']) !!}
{!! Form::close() !!}

<br>
</div>

@endsection