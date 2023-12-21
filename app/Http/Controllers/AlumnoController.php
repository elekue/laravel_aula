<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlumno;
use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Curso;
use Illuminate\Support\Facades\Storage;

class AlumnoController extends Controller
{

    public function index(){
        //$alumnos = Alumno::all();
     //   $alumnos = Alumno::paginate(10);
        $alumnos = Alumno::orderBy('nombre_apellido','desc')->paginate(10);

        return view('alumnos.index', compact('alumnos'));
    }

    public function show(Alumno $alumno){
        return view('alumnos.show', compact('alumno'));
    }

    public function create(){
        return view('alumnos.create');
    }

    public function store(StoreAlumno $request){

        // $request->validate([
        //     'nombre_apellido'=>'required|min:5|max:75',
        //     'edad'=>'required'
        // ]);

    //    $alumno = new Alumno();
    //    $alumno->nombre_apellido = $request->nombre_apellido;
    //    $alumno->edad = $request->edad;
    //    $alumno->telefono = $request->telefono;
    //    $alumno->direccion = $request->direccion;

        $alumno = Alumno::create($request->all());

        if ($request->file('foto')){
            $url = Storage::putFile('public/alumnos',$request->file('foto'));
            $urldb = str_replace('public','storage',$url);
            $alumno->foto = $urldb;
            $alumno->save();
        }


        return redirect()->route('alumnos.index');
    }

    public function edit(Alumno $alumno){
        return view('alumnos.edit', compact('alumno'));
    }

    public function update(StoreAlumno $request, Alumno $alumno){

        // $request->validate([
        //     'nombre_apellido'=>'required|min:5|max:75',
        //     'edad'=>'required'
        // ]);

        // $alumno->nombre_apellido = $request->nombre_apellido;
        // $alumno->edad = $request->edad;
        // $alumno->telefono = $request->telefono;
        // $alumno->direccion = $request->direccion;

        //  $alumno->save();

        $alumno->update($request->all());

         return redirect()->route('alumnos.show',$alumno);
    }

    public function delete(Alumno $alumno){
        return view('alumnos.delete', compact('alumno'));
    }

    public function destroy(Alumno $alumno){
        $alumno->delete();
        return redirect()->route('alumnos.index');
    }

    public function cursos(Alumno $alumno){
        $cursos = $alumno->cursos;

        //        return view('cursos.alumnocursos', ['alumno' => $alumno,'cursos' => $cursos]);
        return view('cursos.index', compact('cursos','alumno'));
    }

    // Matricularemos alumnos en cursos
    public function alumnocursos(Alumno $alumno){
        $cursos = Curso::pluck('nombre','id');
        $cursosAlumno = $alumno->cursos->pluck('nombre', 'id');

        return view('alumnos.alumnocursos', compact('alumno','cursos','cursosAlumno'));
    }



    public function storecursos(Request $request){
        $alumno = Alumno::find($request->alumno); // instancia Alumno

        //   $alumno->cursos()->detach(); // Elimina todo los cursos que tuviera antes
        //   $alumno->cursos()->attach($request->cursos);

        $alumno->cursos()->sync($request->cursos); // Esto hace lo mismo que el detach y attach juntos

        return $this->alumnocursos($alumno);
    }

}
