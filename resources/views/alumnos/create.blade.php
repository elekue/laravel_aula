@extends('layouts.plantilla')

@section('title','IKASLE BERRIA')

@section('content')

    <h1>IKASLE BERRIA</h1>
    {{-- Konponeteekin eginda --}}

    <form action="{{ route('alumnos.store')}}" method="post" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="nombre_apellido" :value="__('Izena')" />
            <x-text-input id="nombre_apellido" name="nombre_apellido" type="text" class="mt-1 block ml-4 w-[80%]" :value="old('nombre_apellido')" />
            <x-input-error class="mt-2" :messages="$errors->get('nombre_apellido')" />
        </div>

        <div>
            <x-input-label for="edad" :value="__('Adina')" />
            <x-text-input id="edad" name="edad" type="text" class="mt-1 block ml-4 w-[80%]" :value="old('edad')" />
            <x-input-error class="mt-2" :messages="$errors->get('edad')" />
        </div>

        <div>
            <x-input-label for="telefono" :value="__('Telefonoa')" />
            <x-text-input id="telefono" name="telefono" type="text" class="mt-1 block ml-4 w-[80%]" :value="old('telefono')"  />
            <x-input-error class="mt-2" :messages="$errors->get('telefono')" />
        </div>

        <div>
            <x-input-label for="direccion" :value="__('Helbidea')" />
            <x-text-input id="direccion" name="direccion" type="text" class="mt-1 block ml-4 w-[80%]" :value="old('direccion')" />
            <x-input-error class="mt-2" :messages="$errors->get('direccion')" />
        </div>

        <div>
            <x-input-label for="foto" :value="__('Argazkia')" />
            <input type="file" name="foto" id="foto" accept="image/*"><br>
            <x-input-error class="mt-2" :messages="$errors->get('foto')" />
        </div>

        <x-primary-button class="ml-4 w-[20%] mx-auto flex justify-center">{{ __('Bidali') }}</x-primary-button>

    </form>

@endsection
