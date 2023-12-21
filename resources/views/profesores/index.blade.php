
@extends('layouts.plantilla')

@section('title','IRAKASLEAK ZERRENDA')

@section('content')
    <h1> IRAKASLEAK ZERRENDA </h1>

    @if (session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <table>
    <tr>
        <th>Izen Abizena</th>
        <th>Profesion</th>
        <th>Grado Academico</th>
        <th>Telefono</th>
        <th>Aldatu</th>
        <th>Ezabatu</th>
    </tr>

    @foreach ($profesores as $profesor)
        <tr>
            <td>
                {{$profesor->nombreApellido}}
            </td>
            <td>{{$profesor->profesion}}</td>
            <td>{{$profesor->gradoAcademico}}</td>
            <td>{{$profesor->telefono}}</td>
            <td>&nbsp;</td>
            <td>
                <form action="{{route('profesores.destroy',$profesor)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Ezabatu">
                </form>
            </td>
        </tr>
    @endforeach
    </table>

@endsection
