<?php
use App\Http\Controllers\EgresadoController;
use Illuminate\Support\Facades\Route;


Route::get('/egresados', [EgresadoController::class, 'index']);

