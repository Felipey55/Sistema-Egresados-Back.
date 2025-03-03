<?php

namespace App\Http\Controllers;

use App\Models\Egresado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EgresadoController extends Controller
{
    public function index()
    {
        return response()->json(Egresado::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'identificacion_tipo' => 'required|string',
            'identificacion_numero' => 'required|unique:egresados,identificacion_numero',
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'celular' => 'required|string',
            'direccion' => 'required|string',
            'email' => 'required|email|unique:egresados,email',
            'fecha_nacimiento' => 'required|date',
            'contrasena' => 'required|string|min:6',
            'ciudad_id' => 'required|integer|exists:ciudades,id',
            'fotografia' => 'nullable|image|mimes:jpg,jpeg,png|max:2048' // Nueva validación para imágenes
        ]);

        // Manejar la imagen
        $fotoPath = null;
        if ($request->hasFile('fotografia')) {
            $fotoPath = $request->file('fotografia')->store('fotografias', 'public');
        }

        $egresado = Egresado::create([
            'identificacion_tipo' => $request->identificacion_tipo,
            'identificacion_numero' => $request->identificacion_numero,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'celular' => $request->celular,
            'direccion' => $request->direccion,
            'email' => $request->email,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'contrasena' => bcrypt($request->contrasena), 
            'ciudad_id' => $request->ciudad_id,
            'fotografia' => $fotoPath,
        ]);

        return response()->json([
            'message' => 'Egresado creado exitosamente',
            'data' => $egresado
        ], 201);
    }
}
