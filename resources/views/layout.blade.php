<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="{{ asset('/assets/fontawesome/css/all.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/animate.min.css') }}" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="{{ asset('/assets/img/teacode.ico') }}">
        <script src="{{ asset('/js/jquery.min.js') }}"></script>
        <script src="{{ asset('/js/app.js') }}"></script>
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body class="antialiased">
        <div class="wrapper">
            <div class="container">
                @yield('content')
                <div class="links">
                    <a href="/links" class="text-capitalize">my links <i class="far fa-hand-point-right"></i></a>
                </div>
                {{-- <div class="resume">
                    <a href="https://resume.teacode.ma" target="_blank">my resume <i class="far fa-hand-point-right"></i></a>
                </div> --}}
            </div>
        </div>
    </body>
</html>
