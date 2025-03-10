<?php
use App\Http\Controllers\EgresadoController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\HistorialLaboralController;
use Illuminate\Support\Facades\Route;

# Extenciones de egresados
Route::post('/egresados', [EgresadoController::class, 'store']);
Route::get('/egresados', [EgresadoController::class, 'index']);
Route::get('/egresados/{id}', [EgresadoController::class, 'show']);
Route::delete('/egresados/{id}', [EgresadoController::class, 'destroy']);
Route::put('/egresados/{id}', [EgresadoController::class, 'update']);

# Extenciones de noticias
Route::get('/noticias', [NoticiasController::class, 'index']);
Route::post('/noticias', [NoticiasController::class, 'store']);


#Extenciones del historial laboral de los egresados
Route::get('/historial', [HistorialLaboralController::class, 'index']);
Route::post('/historial', [HistorialLaboralController::class, 'store']);



