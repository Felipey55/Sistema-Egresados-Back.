<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EgresadoController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/egresados', [EgresadoController::class, 'index']);


