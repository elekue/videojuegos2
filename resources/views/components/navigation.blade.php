<nav style="display: flex; align-items: center; gap: 0.5rem;">
    <ul>
        <li><a href="{{ route('campeonatos.index') }}">Campeonatos</a></li>
        <li><a href="{{ route('jugadores.index') }}">Jugadores</a></li>
        <li><a href="{{ route('participaciones.index') }}">Participaciones</a></li>
    </ul>

    <div class="user-controls">
        @auth
           <!-- <span>Hola, {{ auth()->user()->name }}</span>-->
          
            <form method="POST" action="{{ route('logout') }}">
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