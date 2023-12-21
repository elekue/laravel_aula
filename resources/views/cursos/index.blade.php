
@extends('layouts.plantilla')

@section('title','IKASTURTE ZERRENDA')

@section('content')
    <h1> IKASTARO ZERRENDA </h1>

    <table>
    <tr>
        <th>Izena</th>
        <th>Nivel</th>
        <th>Ordu akademikoa</th>
        <th>Irakaslea</th>
        <th>Aldatu</th>
        <th>Ezabatu</th>
        <th>Matrikulak</th>
    </tr>

    @foreach ($cursos as $curso)
        <tr>
            <td>{{$curso->nombre}}</td>
            <td>{{$curso->nivel}}</td>
            <td>{{$curso->horasAcademicas}}</td>
            <td>{{$curso->profesor->nombreApellido}}</td>
            <td><a href="{{ route('cursos.edit',$curso) }}">[ALDATU]</a></td>
            <td>&nbsp;</td>
            <td><a href="{{ route('cursos.cursoalumnos',$curso) }}">
                Matrikulak
            </a></td>
        </tr>
    @endforeach
    </table>

@endsection
