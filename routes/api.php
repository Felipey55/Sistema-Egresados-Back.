<?php
use App\Http\Controllers\EgresadoController;
use Illuminate\Support\Facades\Route;

Route::post('/egresados', [EgresadoController::class, 'store']);
Route::get('/egresados', [EgresadoController::class, 'index']);



