<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset("web/images/logo.jpg") }}" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.all') }}">Korábbi lapszámok</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.all.stories') }}">Hírek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category.front.index') }}">Kategóriák</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.front.index') }}">Szerzők</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.szerzoknek') }}">Szerzőink figyelmébe</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
