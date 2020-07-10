<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table='contactos';

    protected $fillable = [
    'id','nombre','apellido','email','fecha_nacimiento','imagen','image_url',
    ];

    protected $primaryKey = 'id';
}
