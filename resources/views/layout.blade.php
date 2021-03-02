<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="join a moroccan developers community who can help you in your learning journey.">
        <meta name="keywords" content="teacode, teacodema, javascript, php, laravel, discord, html, css, learn, programming, nodejs, web, development, programmers, developers, bugs, debug, debugging, programmer, coding, developer, bug, code, webdesign, software">
        <meta name="author" content="Driss Boumlik">
        {{-- <meta http-equiv="refresh" content="60"> --}}
        {{-- <meta name="robots" content="index, follow"> --}}
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-1W4QVF4NRJ"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-1W4QVF4NRJ');
        </script>

        <link rel="icon" type="image/x-icon" href="{{ asset('/assets/img/teacode/teacode.ico') }}">

        <!-- Fonts -->
        <link rel="preload" href="{{ asset('/webfonts/fa-solid-900.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="{{ asset('/webfonts/fa-brands-400.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="{{ asset('/assets/fonts/istokweb.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="{{ asset('/assets/fonts/UntitledSansWeb-Bold.woff2') }}" as="font" type="font/woff2" crossorigin>

        <link href="{{ asset('/css/externals.css') }}" rel="preload" as="style">
        <link href="{{ asset('/css/externals.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/app.css') }}" rel="preload" as="style">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <script defer src="{{ asset('/js/app.js') }}"></script>

        <title>{{ $title ?? 'TeaCode | Turning Tea into Code' }}</title>
    </head>
    <body class="antialiased">
        <div class="wrapper">
                @yield('content')
        </div>
        <input type="hidden" class="key-word">
        {{-- @include('partials.loader') --}}
        @include('partials.fb-btn')
    </body>
</html>
