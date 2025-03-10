<?php

namespace App\Http\Controllers;

use App\Models\Historial_Laboral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HistorialLaboralController extends Controller
{
    # Funcion para obtener todos los egresados
    public function index()
    {
        return response()->json(Historial_Laboral::all());
    }


    public function store(Request $request)
    {
        $request->validate([
            'egresado_id' => 'required|integer|exists:egresados,id',
            'tipo_empleo' => 'required|in:Tiempo Completo,Medio Tiempo,Freelance,Otro',
            'nombre_empresa' => 'required|string|max:100',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'numero_empleados' => 'nullable|integer|min:1',
            'servicios' => 'nullable|string',
            'correo_empresa' => 'nullable|email|max:100',
            'url_empresa' => 'nullable|url|max:255',
            'ciudad_id' => 'nullable|integer|exists:ciudades,id',
            'modalidad_trabajo' => 'required|in:Presencial,Remoto,Híbrido',
            'descripcion' => 'nullable|string'
        ]);

        $historial = Historial_Laboral::create([
            'egresado_id' => $request->egresado_id,
            'tipo_empleo' => $request->tipo_empleo,
            'nombre_empresa' => $request->nombre_empresa,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'numero_empleados' => $request->numero_empleados,
            'servicios' => $request->servicios,
            'correo_empresa' => $request->correo_empresa,
            'url_empresa' => $request->url_empresa,
            'ciudad_id' => $request->ciudad_id,
            'modalidad_trabajo' => $request->modalidad_trabajo,
            'descripcion' => $request->descripcion
        ]);

        return response()->json([
            'message' => 'Historial laboral registrado exitosamente',
            'data' => $historial
        ], 201);
    }
}
