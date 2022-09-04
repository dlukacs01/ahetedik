<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

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
    <link href="{{ asset('css/custom/articles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom/categories.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom/users.css') }}" rel="stylesheet">
</head>
