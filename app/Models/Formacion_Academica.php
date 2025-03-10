<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formacion_Academica extends Model
{
    use HasFactory;

    protected $table = 'formacion_academica';
    public $timestamps = false;
    protected $fillable = [
        'egresado_id', 'titulo', 'institucion', 'tipo', 'fecha_realizacion','ciudad_id'
    ];
}
