
@extends('layouts.plantilla')

@section('title','IRAKASLEA BERRIA')

@section('content')

    <h1>IRAKASLEA BERRIA</h1>
    <form action="{{ route('profesores.store')}}" method="post">
        @csrf
        <label for="nombreApellido">Izena Abizena</label>
        <input type="text" name="nombreApellido" id="nombreApellido" value=""><br>

        <label for="profesion">Profesioa</label>
        <select name="profesion" id="profesion">
            <option value="Ing. Informatico">Ing. Informatico</option>
            <option value="Ing. Sistemas">Ing. Sistemas</option>
            <option value="Adm. Empresas">Adm. Empresas</option>
        </select><br>

        <label for="gradoAcademico">Grado Academikoa</label>
        <input type="text" name="gradoAcademico" id="gradoAcademico" value=""><br>

        <label for="telefono">Telefonoa</label>
        <input type="text" name="telefono" id="telefono" value=""><br>

       <button type="submit">Bidali</button>
    </form>

@endsection
