<li class="nav-item dropdown">

    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user fa-fw"></i>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

        @if(auth()->user()->userHasRole('admin'))
            <a class="dropdown-item" href="{{ route('user.edit', auth()->user()) }}">Beállítások</a>
            <div class="dropdown-divider"></div>
        @endif

        {{--https://stackoverflow.com/questions/43087648/logging-out-via-a-link-in-laravel--}}
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Kijelentkezés
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

    </div>
</li>
