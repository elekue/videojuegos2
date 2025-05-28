<nav style="display: flex; align-items: center; gap: 1rem; justify-content: space-between;">
    <ul style="display: flex; list-style: none; gap: 1rem; margin: 0; padding: 0;">
        <li><a href="{{ route('campeonatos.index') }}">Campeonatos</a></li>
        <li><a href="{{ route('jugadores.index') }}">Jugadores</a></li>
        <li><a href="{{ route('participaciones.index') }}">Participaciones</a></li>
    </ul>

    <div class="user-controls" style="display: flex; align-items: center; gap: 1rem;">
        @auth
            <span>Hola, {{ auth()->user()->nombre }}</span>

            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" style="background:none; border:none; color:#00f; cursor:pointer; text-decoration:underline; padding:0; font:inherit;">
                    Cerrar sesión
                </button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
        @endauth
    </div>
</nav>