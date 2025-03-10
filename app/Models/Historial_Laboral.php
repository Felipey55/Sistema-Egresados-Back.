<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial_Laboral extends Model
{
    use HasFactory;

    protected $table = 'historial_laboral';
    public $timestamps = false;
    protected $fillable = [
        'egresado_id', 'tipo_empleo', 'nombre_empresa', 'fecha_inicio', 'fecha_fin',
        'numero_empleados', 'servicios', 'correo_empresa', 'url_empresa', 'ciudad_id', 'modalidad_trabajo', 'descripcion'
    ];
}
