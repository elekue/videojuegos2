<form method="POST" action="{{ route('participaciones.update', $participacion->id) }}">
    @csrf
    @method('PUT')

    <label for="campeonato_id">Campeonato:</label>
    <select name="campeonato_id">
        @foreach ($campeonatos as $camp)
            <option value="{{ $camp->id }}" {{ $camp->id == $participacion->campeonato_id ? 'selected' : '' }}>
                {{ $camp->nombre }}
            </option>
        @endforeach
    </select>

    <label for="user_id">Jugador:</label>
    <select name="user_id">
        @foreach ($jugadores as $jug)
            <option value="{{ $jug->id }}" {{ $jug->id == $participacion->user_id ? 'selected' : '' }}>
                {{ $jug->name }}
            </option>
        @endforeach
    </select>

    {{-- Solo si es admin, mostramos puntos y premio --}}
    @if(auth()->user() && auth()->user()->isAdmin())
        <label for="puntos">Puntos:</label>
        <input type="number" name="puntos" value="{{ old('puntos', $participacion->puntos) }}">

        <label for="premio">Premio:</label>
        <input type="text" name="premio" value="{{ old('premio', $participacion->premio) }}">
    @endif

    <button type="submit">Actualizar</button>
</form>