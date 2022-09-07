<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A Hetedik Független Irodalmi, Kulturális Folyóirat és Alkotóközösség">
    <meta name="keywords" content="hetedik, független, irodalom, kultúra, folyóirat, alkotó, közösség, költészet,
                            költő, irodalom, művészet, kortárs, vers, líra, próza, epika, novella, elbeszélés, kritika,
                            tárca, recenzió, dráma, színmű, riport, interjú">
    <meta name="author" content="David Lukacs">

    <title>{!! isset($title) ? $title : config('app.name') !!}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('web/images/favicon.ico') }}">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- main Bootstrap CSS file from laravel ui commands --}}
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}

    <!-- Custom styles for this template (general) -->
    <link href="{{ asset('css/blog-home.css') }}" rel="stylesheet">

    <!-- Custom styles (components) -->
    <link href="{{ asset('css/custom/home/articles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom/home/authors.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom/home/authors_media.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom/home/categories.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom/profile.css') }}" rel="stylesheet">
</head>
