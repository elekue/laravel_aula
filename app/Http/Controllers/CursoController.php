<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCurso;
use App\Models\Curso;
use App\Models\Profesor;
use Illuminate\Http\Request;

class CursoController extends Controller
{

    public function index(){
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }


    public function create(){
        $profesores = Profesor::all();
        return view('cursos.create', compact('profesores'));
    }

    public function store(StoreCurso $request){
        // $curso = new Curso();
        // $curso->nombre = $request->nombre;
        // $curso->nivel = $request->nivel;
        // $curso->horasAcademicas = $request->horasAcademicas;
        // $curso->profesor_id = $request->profesor_id;

        //  $curso->save();

        $curso = Curso::create($request->all());

         return redirect()->route('cursos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(Curso $curso){
        $profesores = Profesor::all();
        return view('cursos.edit', compact('profesores','curso'));
    }


    public function update(StoreCurso $request, Curso $curso){
        // $curso->nombre = $request->nombre;
        // $curso->nivel = $request->nivel;
        // $curso->horasAcademicas = $request->horasAcademicas;
        // $curso->profesor_id = $request->profesor_id;

        // $curso->save();

        $curso->update($request->all());

         return redirect()->route('cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cursoalumnos(Curso $curso){
        $alumnos = $curso->alumnos;

//        return view('cursos.alumnocursos', ['alumno' => $alumno,'cursos' => $cursos]);

        return view('cursos.alumnocursos', compact('curso','alumnos'));
    }

}
