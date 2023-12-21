<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ProfesorController;
use Illuminate\Support\Facades\Route;

// Alumnos rutak
// Route::get('/',[AlumnoController::class,'index'])->name('alumnos.index');
// Route::get('alumnos',[AlumnoController::class,'index'])->name('alumnos.index');
// Route::get('alumnos/create',[AlumnoController::class,'create'])->name('alumnos.create');
// Route::post('alumnos/store',[AlumnoController::class,'store'])->name('alumnos.store');
// Route::get('alumnos/edit/{alumno}',[AlumnoController::class,'edit'])->name('alumnos.edit');
// Route::put('alumnos/update/{alumno}',[AlumnoController::class,'update'])->name('alumnos.update');
// Route::get('alumnos/delete/{alumno}',[AlumnoController::class,'delete'])->name('alumnos.delete');
// Route::delete('alumnos/{alumno}',[AlumnoController::class,'destroy'])->name('alumnos.destroy');
// Route::get('alumnos/{alumno}',[AlumnoController::class,'show'])->name('alumnos.show');

Route::get('/',[AlumnoController::class,'index'])->name('alumnos.index');

// Route::controller(AlumnoController::class)->group(function (){
//     Route::get('alumnos','index')->name('alumnos.index');
//     Route::get('alumnos/create','create')->name('alumnos.create');
//     Route::post('alumnos/store','store')->name('alumnos.store');
//     Route::get('alumnos/edit/{alumno}','edit')->name('alumnos.edit');
//     Route::put('alumnos/update/{alumno}','update')->name('alumnos.update');
//     Route::get('alumnos/delete/{alumno}','delete')->name('alumnos.delete');
//     Route::delete('alumnos/{alumno}','destroy')->name('alumnos.destroy');
//     Route::get('alumnos/{alumno}','show')->name('alumnos.show');
// });


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

?>
