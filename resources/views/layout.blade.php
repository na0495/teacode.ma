<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/plugins/bootstrap/css/bootstrap.min.css') }}">
        <link href="{{ asset('/assets/fontawesome/css/all.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/animate.min.css') }}" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="{{ asset('/assets/img/teacode/teacode.ico') }}">
        <script src="{{ asset('/js/jquery.min.js') }}"></script>
        <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/plugins/particles/particles.js') }}"></script>
        <script src="{{ asset('/js/app.js') }}"></script>

        {{-- <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/TweenMax-latest-beta.js"></script> --}}
        {{-- <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/MorphSVGPlugin.min.js"></script> --}}
        <title>@yield('title')</title>
    </head>
    <body class="antialiased">
        <div class="wrapper">
                @yield('content')
                {{-- <div class="links">
                    <a href="/links" class="text-capitalize">my links <i class="far fa-hand-point-right"></i></a>
                </div> --}}
                {{-- <div class="resume">
                    <a href="https://resume.teacode.ma" target="_blank">my resume <i class="far fa-hand-point-right"></i></a>
                </div> --}}
        </div>
        <div class="loader-wrapper">
            <div class="loader">
                <img src="{{ asset('/assets/img/teacode/teacode.png') }}" alt="">
            </div>
        </div>
    </body>
</html>
