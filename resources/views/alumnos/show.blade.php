@extends('layouts.plantilla')

@section('title','IKASLEA IKUSI')

@section('content')

    <h1>IKASLE {{$alumno->nombre_apellido}} </h1>
    Izena: {{$alumno->nombre_apellido}} <br>
    @if ($alumno->foto)
        <img src="{{url($alumno->foto)}}" alt="" width="200px" height="200px">
    @else
        <img src="{{url('storage/alumnos/usuario.jpg')}}" alt="" width="200px" height="200px">
    @endif


    Adina: {{$alumno->edad}} <br>
    Telefonoa: {{$alumno->telefono}}<br>
    Direccion: {{$alumno->direccion}}
    <br><br>
    <a href="{{ route('alumnos.edit',$alumno) }}">
        Editatu
    </a>
    <br>
    <a href="{{ route('alumnos.delete',$alumno) }}">
        Ezabatu
    </a>

    {{-- <form action="{{route('alumnos.destroy',$alumno)}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Ezabatu">
    </form> --}}
@endsection
