<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset("web/images/topnav_logo.jpg") }}" alt="{{ config('app.name') }}">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post.posts') }}">Korábbi lapszámok</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('story.stories') }}">Hírek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category.categories') }}">Kategóriák</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.authors') }}">Szerzők</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('meta.szerzoknek') }}">Szerzőink figyelmébe</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
