<?php
use App\Http\Controllers\EgresadoController;
use Illuminate\Support\Facades\Route;

# Extenciones de egresados
Route::post('/egresados', [EgresadoController::class, 'store']);
Route::get('/egresados', [EgresadoController::class, 'index']);
Route::get('/egresados/{id}', [EgresadoController::class, 'show']);
Route::delete('/egresados/{id}', [EgresadoController::class, 'destroy']);
Route::put('/egresados/{id}', [EgresadoController::class, 'update']);



