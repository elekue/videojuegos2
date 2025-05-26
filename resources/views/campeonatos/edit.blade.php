@extends('layouts.app')

@section('content')
    <h1>Editar Campeonato</h1>
    <div class="campeonato-card">
    <form method="POST" action="{{ route('campeonatos.update', $campeonato->id) }}">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $campeonato->nombre) }}"><br><br>

        <label for="localidad">Localidad:</label><br>
<input type="text" name="localidad" id="localidad" value="{{ old('localidad', $campeonato->localidad) }}"><br><br>

        <label for="fecha_inicio">Fecha de inicio:</label><br>
        <input type="date" name="fecha_inicio" id="fecha_inicio" 
        value="{{ old('fecha_inicio', $campeonato->fecha_inicio ? $campeonato->fecha_inicio->format('Y-m-d') : '') }}"><br><br>

        <label for="fecha_fin">Fecha de fin:</label><br>
        <input type="date" name="fecha_fin" id="fecha_fin"
        value="{{ old('fecha_fin', $campeonato->fecha_fin ? $campeonato->fecha_fin->format('Y-m-d') : '') }}"><br><br>

        @if(auth()->check() && auth()->user()->isAdmin())
            <label for="premio">Premio:</label><br>
            <input type="number" name="premio" id="premio" value="{{ old('premio') }}"><br><br>
         @endif
        <label for="tipo">Tipo:</label><br>
        <select name="tipo" id="tipo">
            <option value="individual" {{ old('tipo', $campeonato->tipo) == 'individual' ? 'selected' : '' }}>Individual</option>
            <option value="equipo" {{ old('tipo', $campeonato->tipo) == 'equipo' ? 'selected' : '' }}>Equipo</option>
            <option value="mixto" {{ old('tipo', $campeonato->tipo) == 'mixto' ? 'selected' : '' }}>Mixto</option>
        </select><br><br>

        <label for="normas">Normas:</label><br>
        <textarea name="normas" id="normas">{{ old('normas', $campeonato->normas) }}</textarea><br><br>

        <button type="submit">Actualizar Campeonato</button>
    </form>
    </div>
@endsection