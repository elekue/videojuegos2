@extends('layouts.app')
@section('title', 'Identificarse')
@section('content')
<div class="container">
    <h1>Identificarse</h1>

    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <label>Email:</label>
        <input type="email" name="email" required>
        @error('email')
            <p style="color:red;">{{ $message }}</p>
        @enderror

        <button type="submit">Entrar</button>
    </form>
</div>
@endsection