
@extends('layouts.plantilla')

@section('title','IKASTAROA ALDATU')

@section('content')

    <h1>IKASTAROA ALDATU</h1>
    <form action="{{ route('cursos.update',$curso)}}" method="post">
        @csrf
        @method('PUT')
        <label for="nombre">Izena</label>

        <input type="text" name="nombre" id="nombre" value="{{old('nombre',$curso->nombre)}}"><br>
        @error('nombre')
            <p class="akatsa">{{$message}}</p>
        @enderror
        <label for="nivel">Maila</label>
        <select name="nivel" id="nivel">
            <option value="Básico" @if(old('nivel',$curso->nivel) == 'Básico') selected @endif>Básico</option>
            <option value="Medio" @if(old('nivel',$curso->nivel) == 'Medio') selected @endif>Medio</option>
            <option value="Avanzado" @if(old('nivel',$curso->nivel) == 'Avanzado') selected @endif>Avanzado</option>
        </select><br>
        @error('nivel')
            <p class="akatsa">{{$message}}</p>
        @enderror

        <label for="horasAcademicas">Ordu akademikoak</label>
        <input type="text" name="horasAcademicas" id="horasAcademicas" value="{{old('horasAcademicas',$curso->horasAcademicas)}}"><br>

        <label for="profesor_id">Irakasleak</label>
        <select name="profesor_id" id="profesor_id">

            @foreach ($profesores as $profesor)
                    <option value="{{$profesor->id}}"  @if(old('profesor_id',$curso->profesor_id) == $profesor->id) selected @endif>{{$profesor->nombreApellido}}</option>
            @endforeach

        </select>

       <button type="submit">Bidali</button>
    </form>

@endsection
