<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ProfesorController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
});


// GURE RUTAK ******************************************************
Route::middleware('auth')->group(function () {
    Route::get('alumnos/delete/{alumno}',[AlumnoController::class,'delete'])->name('alumnos.delete');
    Route::resource('alumnos',AlumnoController::class);
    Route::get('alumnos/cursos/{alumno}',[AlumnoController::class,'cursos'])->name('alumnos.cursos');
    Route::get('alumnos/alumnocursos/{alumno}', [AlumnoController::class, 'alumnocursos'] )->name('alumnos.alumnocursos');
    Route::post('alumnos/storecursos', [AlumnoController::class, 'storecursos'] )->name('alumnos.storecursos');

    // CURSOS *********************
    Route::get('cursos',[CursoController::class,'index'])->name('cursos.index');
    Route::get('cursos/create',[CursoController::class,'create'])->name('cursos.create');
    Route::post('cursos/store',[CursoController::class,'store'])->name('cursos.store');
    Route::get('cursos/edit/{curso}',[CursoController::class,'edit'])->name('cursos.edit');
    Route::put('cursos/update/{curso}',[CursoController::class,'update'])->name('cursos.update');
    Route::get('cursos/cursoalumnos/{curso}',[CursoController::class,'cursoalumnos'])->name('cursos.cursoalumnos');

    // PROFESORES *********************
    Route::get('profesores',[ProfesorController::class,'index'])->name('profesores.index');
    Route::get('profesores/create',[ProfesorController::class,'create'])->name('profesores.create');
    Route::post('profesores/store',[ProfesorController::class,'store'])->name('profesores.store');
    Route::delete('profesores/{profesor}',[ProfesorController::class,'destroy'])->name('profesores.destroy');

});

require __DIR__.'/auth.php';
