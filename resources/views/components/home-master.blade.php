<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>A hetedik</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('css/favicon.jpg')}}">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    {{--    main Bootstrap CSS file from laravel ui commands--}}
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}

    <!-- Custom styles for this template -->
    <link href="{{asset('css/blog-home.css')}}" rel="stylesheet">

    <!-- Custom styles -->
    <link href="{{asset('css/custom/articles.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom/categories.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom/profile.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom/users.css')}}" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset("web/images/hetedik_logo.jpg")}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
{{--                <li class="nav-item active">--}}
{{--                    <a class="nav-link" href="{{route('home')}}">Home--}}
{{--                        <span class="sr-only">(current)</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.index')}}">Admin</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Register</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.all')}}">Korábbi lapszámok</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.all.stories')}}">Hírek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('category.front.index')}}">Kategóriák</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.front.index')}}">Szerzők</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.szerzoknek')}}">Szerzőink figyelmébe</a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">Contact</a>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            @yield('content')

        </div>

        <!-- Sidebar Widgets Column -->
        <?php
        $stories = App\Story::latest()->whereDate('expiration_date', '>=', date('Y-m-d'))->take(3)->get();
        $categories = App\Category::all();
        $works = App\Work::latest()->whereDate('release_date', '<=', date('Y-m-d'))->take(3)->get();
        $works_active = App\Work::latest()->where('active',1)->whereDate('release_date', '<=', date('Y-m-d'))->take(3)->get();
        ?>
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Keresés</h5>
                <div class="card-body">
                    <form action="{{route('home.search')}}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Keresés...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="submit">Mehet!</button>
                        </span>
                    </div>
                    </form>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Hírek</h5>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled mb-0">
                                @foreach($stories as $story)
                                    <li>
                                        <a href="{{route('story', $story->slug)}}">{{$story->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Kategóriák</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled mb-0">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{route('work.category', $category->slug)}}">{{$category->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
{{--                        <div class="col-lg-6">--}}
{{--                            <ul class="list-unstyled mb-0">--}}
{{--                                <li>--}}
{{--                                    <a href="#">JavaScript</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">CSS</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">Tutorials</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Legújabb művek</h5>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled mb-0">
                                @foreach($works as $work)
                                    <li>
                                        <a href="{{route('work', $work->slug)}}">{{$work->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Kiemelt művek</h5>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled mb-0">
                                @foreach($works_active as $work_active)
                                    <li>
                                        <a href="{{route('work', $work_active->slug)}}">{{$work_active->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5">
    <div class="container">
        <p class="m-0 text-center text-muted">Minden jog fenntartva &copy; A hetedik {{\Carbon\Carbon::now()->year}}</p>
        <p class="text-center text-muted small">v0.1</p>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="{{route('home.nyilatkozat')}}">Szerkesztőségi nyilatkozat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('home.elvek')}}">Szerkesztési elvek</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('home.jogok')}}">Szerzői jogok</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('home.impresszum')}}">Impresszum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('home.gdpr')}}">Általános Adatvédelmi Nyilatkozat</a>
            </li>
        </ul>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- for loading page level scripts -->
@yield('scripts')

</body>

</html>
