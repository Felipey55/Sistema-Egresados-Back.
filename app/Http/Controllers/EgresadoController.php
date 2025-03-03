<?php

namespace App\Http\Controllers;

use App\Models\Egresado;
use Illuminate\Http\Request;

class EgresadoController extends Controller
{
    public function index()
    {
        return response()->json(Egresado::all());
    }
}
