@extends('layouts.app')

@section('content')
    <h1>Nuevo Campeonato</h1>

    {{-- Mostrar errores de validación 
    @if ($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif--}}

    <form action="{{ route('campeonatos.store') }}" method="POST">
        @csrf

        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"><br><br>
       
        <label for="localidad">Localidad:</label><br>
        <input type="text" name="localidad" id="localidad" value="{{ old('localidad') }}"><br><br>

        <label for="fecha_inicio">Fecha de inicio:</label><br>
        <input type="date" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio') }}"><br><br>

        <label for="fecha_fin">Fecha de fin:</label><br>
        <input type="date" name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin') }}"><br><br>
        @if(auth()->check() && auth()->user()->is_Admin)
            <label for="premio">Premio:</label><br>
            <input type="number" name="premio" id="premio" value="{{ old('premio') }}"><br><br>
         @endif
        

        <label for="tipo">Tipo:</label><br>
        <select name="tipo" id="tipo">
            <option value="individual" {{ old('tipo') == 'individual' ? 'selected' : '' }}>Individual</option>
            <option value="equipo" {{ old('tipo') == 'equipo' ? 'selected' : '' }}>Equipo</option>
        </select><br><br>

        <label for="normas">Normas:</label><br>
        <textarea name="normas" id="normas">{{ old('normas') }}</textarea><br><br>

        {{--utilizo old para para recuperar el valor que el usuario había escrito si el formulario falla en la validación y se recarga la vista.--}}

        <button type="submit">Crear campeonato</button>
    </form>
@endsection