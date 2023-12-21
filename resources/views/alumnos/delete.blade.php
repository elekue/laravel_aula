@extends('layouts.plantilla')

@section('title','IKASLEA EZABATU')

@section('content')

    <h1>EZABATU IKASLE {{$alumno->nombre_apellido}} </h1>
    Zaude ziur {{$alumno->nombre_apellido}} egin nahi duzula? <br>

    <form action="{{route('alumnos.destroy',$alumno)}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Ezabatu">
    </form>
    <br><br>
    <a href="{{ route('alumnos.index') }}">
        Cancel
    </a>
@endsection
