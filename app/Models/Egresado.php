<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egresado extends Model
{
    use HasFactory;

    protected $table = 'egresados';
    protected $fillable = [
        'identificacion_tipo', 'identificacion_numero', 'fotografia', 'nombre', 'apellidos',
        'celular', 'direccion', 'email', 'fecha_nacimiento', 'contrasena', 'ciudad_id'
    ];
}
