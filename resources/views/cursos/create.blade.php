
@extends('layouts.plantilla')

@section('title','IKASTARO BERRIA')

@section('content')

    <h1>IKASTARO BERRIA</h1>
    <form action="{{ route('cursos.store')}}" method="post">
        @csrf
        <label for="nombre">Izena</label>
        <input type="text" name="nombre" id="nombre" value=""><br>

        <label for="nivel">Maila</label>
        <select name="nivel" id="nivel">
            <option value="Básico">Básico</option>
            <option value="Intermedio">Intermedio</option>
            <option value="Avanzado">Avanzado</option>
        </select><br>

        <label for="horasAcademicas">Ordu akademikoak</label>
        <input type="text" name="horasAcademicas" id="horasAcademicas" value=""><br>

        <label for="profesor_id">Irakasleak</label>
        <select name="profesor_id" id="profesor_id">

            @foreach ($profesores as $profesor)
                    <option value="{{$profesor->id}}">{{$profesor->nombreApellido}}</option>
            @endforeach

        </select>

       <button type="submit">Bidali</button>
    </form>

@endsection
