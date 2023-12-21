
@extends('layouts.plantilla')

@section('title','IKASLE ALDATU')

@section('content')

    <h1>IKASLEA ALDATU</h1>
    <form action="{{ route('alumnos.update',$alumno)}}" method="post">
        @csrf
        @method('put')
       Nombre <input type="text" name="nombre_apellido" value="{{old('nombre_apellido',$alumno->nombre_apellido)}}"><br>
       @error('nombre_apellido')
            <p class="akatsa">{{$message}}</p>
        @enderror
       Edad <input type="text" name="edad" value="{{old('edad',$alumno->edad)}}"><br>
       @error('edad')
            <p class="akatsa">{{$message}}</p>
        @enderror
       Telefono <input type="text" name="telefono" value="{{old('telefono',$alumno->telefono)}}"><br>
       Direccion <input type="text" name="direccion" value="{{old('direccion',$alumno->direccion)}}"><br>
       <button type="submit">Bidali</button>
    </form>

@endsection
