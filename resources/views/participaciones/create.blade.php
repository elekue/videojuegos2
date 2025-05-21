@extends('layouts.app')

@section('content')
    <h1>Participación en un Campeonato</h1>

    @if(session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('participaciones.store') }}" method="POST" style="margin-top: 20px;">
        @csrf

        <label for="campeonato_id">Selecciona un campeonato:</label><br>
        <select name="campeonato_id" required>
            <option value="">-- Elige uno --</option>
            @foreach($campeonatos as $campeonato)
                <option value="{{ $campeonato->id }}">{{ $campeonato->nombre }}</option>
            @endforeach
        </select>
        <br><br>

        {{-- Solo si deseas que introduzcan también otros campos --}}
        {{-- <label for="anio">Año:</label>
        <input type="number" name="anio" value="{{ old('anio') }}" required>
        <br><br> --}}

        <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px;">
            Grabar datos de Campeonato
        </button>
    </form>
@endsection