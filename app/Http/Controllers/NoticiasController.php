<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticiasController extends Controller
{
    # Funcion para obtener todos los egresados
    public function index()
    {
        return response()->json(Noticias::all());
    }


#Funcion para crear noticias

    public function store(Request $request){
        $request->validate([
            'titulo' => 'required|string',
            'contenido' => 'required|string',
            'fecha_publicacion' => 'required|date',
            'autor_id' => 'required|integer|exists:egresados,id',
        ]);


        $noticia = Noticias::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'fecha_publicacion' => $request->fecha_publicacion,
            'autor_id' => $request->autor_id
        ]);

        return response()->json([
            'message' => 'Noticia creada exitosamente',
            'data' => $noticia
        ], 201);
    }
}
