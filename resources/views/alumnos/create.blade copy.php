
@extends('layouts.plantilla')

@section('title','IKASLE BERRIA')

@section('content')

    <h1>IKASLE BERRIA</h1>
    <form action="{{ route('alumnos.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        Izena <input type="text" name="nombre_apellido" value="{{old('nombre_apellido')}}"><br>
        @error('nombre_apellido')
            <p class="akatsa">{{$message}}</p>
        @enderror

        Adina <input type="text" name="edad" value="{{old('edad')}}"><br>
        @error('edad')
        <p class="akatsa">{{$message}}</p>
        @enderror

       Telefonoa <input type="text" name="telefono" value="{{old('telefono')}}"><br>
       Helbidea <input type="text" name="direccion" value="{{old('direccion')}}"><br>
       Argazkia <input type="file" name="foto" id="foto" accept="image/*"><br>
       @error('foto')
            <p class="akatsa">{{$message}}</p>
        @enderror
       <button type="submit">Bidali</button>
    </form>

@endsection
