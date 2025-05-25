@extends('layouts.app')

@section('content')

    <h1>Editar Participación</h1>

    <form action="{{ route('participaciones.update', $participacion) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Campeonato:</label>
            <span>{{ $participacion->campeonato->nombre }}</span>
        </div>

        <div>
            <label>Jugador:</label>
            <span>{{ $participacion->jugador->nick }}</span>
        </div>

        <div>
            <label for="puesto">Puesto:</label>
            <input type="number" name="puesto" id="puesto" value="{{ old('puesto', $participacion->puesto) }}" min="1" required>
            @error('puesto')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="premio">Premio (€):</label>
            <input type="number" step="0.01" name="premio" id="premio" value="{{ old('premio', $participacion->premio) }}">
            @error('premio')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Guardar Cambios</button>
    </form>
    <a href="{{ route('participaciones.index') }}">Volver al listado</a>
@endsection