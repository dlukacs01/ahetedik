<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="{{route('user.profile.edit', auth()->user())}}">Beállítások</a>
{{--        <a class="dropdown-item" href="#">Activity Log</a>--}}
        <div class="dropdown-divider"></div>
        {{--<a class="dropdown-item" href="login.html">Logout</a>--}}

        {{--https://stackoverflow.com/questions/43087648/logging-out-via-a-link-in-laravel--}}
        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Kijelentkezés
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

    </div>
</li>
