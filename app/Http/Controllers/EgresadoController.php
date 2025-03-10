<?php

namespace App\Http\Controllers;

use App\Models\Egresado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EgresadoController extends Controller{
    # Funcion para obtener todos los egresados
    public function index(){
        return response()->json(Egresado::all());
    }

    # Funcion para crear un egresado
    public function store(Request $request){
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

    #Buscar egresado por id

    public function show($id){
        $egresado = Egresado::find($id);

        if (!$egresado) {
            return response()->json(['message' => 'Egresado no encontrado'], 404);
        }

        return response()->json($egresado);
    }

    /*************  ✨ Codeium Command 🌟  *************/
    /**
     * Elimina un egresado por su ID
     *
     * @param int $id El ID del egresado
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $egresado = Egresado::find($id);

        if (!$egresado) {
            return response()->json(['message' => 'Egresado no encontrado'], 404);
        }

        // Eliminar la imagen asociada al egresado
        // Eliminar la fotografía si existe
        if ($egresado->fotografia) {
            Storage::disk('public')->delete($egresado->fotografia);
        }

        $egresado->delete();

        return response()->json(['message' => 'Egresado eliminado exitosamente']);
    }

    #Funcion para editar un egresado 
    public function update(Request $request, $id){
        $egresado = Egresado::find($id);

        if (!$egresado) {
            return response()->json(['message' => 'Egresado no encontrado'], 404);
        }

        $request->validate([
            'identificacion_tipo' => 'sometimes|string',
            'identificacion_numero' => 'sometimes|unique:egresados,identificacion_numero,' . $id,
            'nombre' => 'sometimes|string',
            'apellidos' => 'sometimes|string',
            'celular' => 'sometimes|string',
            'direccion' => 'sometimes|string',
            'email' => 'sometimes|email|unique:egresados,email,' . $id,
            'fecha_nacimiento' => 'sometimes|date',
            'contrasena' => 'sometimes|string|min:6',
            'ciudad_id' => 'sometimes|integer|exists:ciudades,id',
            'fotografia' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Actualizar los datos
        $egresado->fill($request->except('contrasena', 'fotografia'));

        if ($request->has('contrasena')) {
            $egresado->contrasena = bcrypt($request->contrasena);
        }

        // Manejo de fotografía
        if ($request->hasFile('fotografia')) {
            if ($egresado->fotografia) {
                Storage::disk('public')->delete($egresado->fotografia);
            }
            $egresado->fotografia = $request->file('fotografia')->store('fotografias', 'public');
        }

        $egresado->save();

        return response()->json([
            'message' => 'Egresado actualizado exitosamente',
            'data' => $egresado
        ]);
    }
}
