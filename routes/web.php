<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\HorarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí definimos todas las rutas de la aplicación.
|
*/

// Ruta de bienvenida
Route::get('/', function () {
    return view('welcome'); // Aquí se carga la pantalla bonita de bienvenida
});

// Rutas RESTful para cada entidad
Route::resource('estudiantes', EstudianteController::class);
Route::resource('docentes', DocenteController::class);
Route::resource('asignaturas', AsignaturaController::class);
Route::resource('horarios', HorarioController::class);

// Rutas especiales para consultar horarios por estudiante o docente
Route::get('horarios/estudiante/{id}', [HorarioController::class, 'porEstudiante'])->name('horarios.porEstudiante');
Route::get('horarios/docente/{id}', [HorarioController::class, 'porDocente'])->name('horarios.porDocente');
