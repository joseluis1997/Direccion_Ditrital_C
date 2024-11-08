<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfesoresController;
use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\NucleosController;
use App\Http\Controllers\UnidadesEducativasController;
use App\Http\Controllers\EstudiantesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('roles', RoleController::class);
    Route::resource('profesores', ProfesoresController::class);
    // Ruta para mostrar el PDF
    Route::get('profesores/{id}/pdf', [ProfesoresController::class, 'mostrarPdf'])->name('profesores.pdf');
    Route::resource('users', UserController::class);
    Route::resource('actividades', ActividadesController::class);
    Route::resource('nucleos', NucleosController::class);
    Route::resource('UnidadesEducativas', UnidadesEducativasController::class);
    Route::resource('estudiantes', EstudiantesController::class);

    //-----------REPORTES-------------//
    Route::get('/estudiantes/reporte', [EstudiantesController::class, 'reporte'])->name('estudiantes.reporte');

});

require __DIR__.'/auth.php';
