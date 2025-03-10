<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportes extends Model
{
    use HasFactory;

    protected $table = 'reportes';
    public $timestamps = false;
    protected $fillable = [
        'nombre', 'descripcion', 'fecha_generacion', 'generado_por'
    ];
}
