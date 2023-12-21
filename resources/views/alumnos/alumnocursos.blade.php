@extends('layouts.plantilla')
@section('title', 'Ikasleen zerrenda')

@section('content')

    <h2>MATRIKULAZIOA</h2>

    Ikaslea: {{ $alumno->nombre_apellido }}
    <form action="{{ route('alumnos.storecursos') }}" method="POST">
        @csrf
        <input type="hidden" name="alumno" value="{{ $alumno->id }}">
        @foreach($cursos as $cursoId => $cursoNombre)
            <div>
                <label>
                    {{-- keys()->toArray() se utiliza para obtener un array simple de las claves de la colección, lo cual permite utilizar la función in_array() de PHP para realizar la verificación de pertenencia del $cursoId en ese array de claves. --}}
                    {{-- <input type="checkbox" name="cursos[]" value="{{ $cursoId }}" @if($cursosAlumno->contains($cursoId)) checked @endif> --}}
                    <input type="checkbox" name="cursos[]" value="{{ $cursoId }}" @if(in_array($cursoId, $cursosAlumno->keys()->toArray())) checked @endif>
                    {{ $cursoNombre }}
                </label>
            </div>
        @endforeach
        <button type="submit">Matrikulatu</button>
    </form>

@endsection
