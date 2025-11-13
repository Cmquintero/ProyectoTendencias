<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    EstudianteController,
    DocenteController,
    AsignaturaController,
    HorarioController,
    LoginController
};

// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/register', [LoginController::class, 'showRegister'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/forgot', [LoginController::class, 'showForgot'])->name('forgot');
Route::post('/forgot', [LoginController::class, 'sendResetLink'])->name('forgot.post');

// 🔒 Rutas protegidas
Route::middleware('auth')->group(function () {
    Route::resource('estudiantes', EstudianteController::class);
    Route::resource('docentes', DocenteController::class);
    Route::resource('asignaturas', AsignaturaController::class);
    Route::resource('horarios', HorarioController::class);

    Route::get('horarios/estudiante/{id}', [HorarioController::class, 'porEstudiante'])->name('horarios.porEstudiante');
    Route::get('horarios/docente/{id}', [HorarioController::class, 'porDocente'])->name('horarios.porDocente');
});
// Formulario para reset
Route::get('/reset-password/{token}', [LoginController::class, 'showResetForm'])->name('password.reset');

// Enviar el nuevo password
Route::post('/reset-password', [LoginController::class, 'resetPassword'])->name('password.update');
