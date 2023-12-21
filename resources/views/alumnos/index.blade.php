
@extends('layouts.plantilla')

@section('title','IKASLE ZERRENDA')

@section('content')
    <h1> IKASLE ZERRENDA </h1>

    <table>
    <tr>
        <th>Argazkia</th>
        <th>Izen abizen</th>
        <th>Adina</th>
        <th>Telefonoa</th>
        <th>Helbidea</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>Matrikulak</th>
    </tr>

    @foreach ($alumnos as $alumno)
        <tr>
            <td>
                @if ($alumno->foto)
                    <img src="{{url($alumno->foto)}}" alt="" width="20px" height="20px">
                @else
                    <img src="{{url('storage/alumnos/usuario.jpg')}}" alt="" width="20px" height="20px">
                @endif
            </td>
            <td><a href="{{ route('alumnos.show',$alumno) }}">
                        {{$alumno->nombre_apellido}}
                    </a>
            </td>
            <td>{{$alumno->edad}}</td>
            <td>{{$alumno->telefono}}</td>
            <td>{{$alumno->direccion}}</td>
            <td><a href="{{ route('alumnos.edit',$alumno) }}">
                        Editatu
                    </a></td>
            <td><a href="{{ route('alumnos.delete',$alumno) }}">
                        Ezabatu
                    </a></td>
            <td><a href="{{ route('alumnos.cursos',$alumno) }}">
                Ikastaroak
            </a></td>
            <td><a href="{{ route('alumnos.alumnocursos',$alumno) }}">
                Matrikulatu
            </a></td>
        </tr>
    @endforeach
    </table>

    {{$alumnos->links()}}

@endsection
