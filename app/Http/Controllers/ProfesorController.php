<?php

namespace App\Http\Controllers;
use App\Models\Profesor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProfesorController extends Controller
{

    public function index(){
        $profesores = Profesor::all();
        return view('profesores.index', compact('profesores'));
    }

    public function create(){
        return view('profesores.create');
    }

    public function store(Request $request){

        // $profesor = new Profesor();
        // $profesor->nombreApellido = $request->nombreApellido;
        // $profesor->profesion = $request->profesion;
        // $profesor->gradoAcademico = $request->gradoAcademico;
        // $profesor->telefono = $request->telefono;

        //  $profesor->save();

        $profesor = Profesor::create($request->all());

         return redirect()->route('profesores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(Profesor $profesor){
        $cursosDelProfesor = $profesor->cursos;

        if($cursosDelProfesor->isNotEmpty()){ // Ikastaroak ditu, ezin da ezabatu
            return redirect()->route('profesores.index')
                ->with('error','Irakasle honek ikastaroak ditu, ezin dugu ezabatu');
        }else{
            $profesor->delete();

            return redirect()->route('profesores.index')
                ->with('success','Irakaslea ondo ezabatu da');
        }


    }
}
