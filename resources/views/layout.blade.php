<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description"
        content="Join other moroccan developers who can help you in your leaning journey. ">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-159372011-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-159372011-1');
        </script> --}}

        <link rel="icon" type="image/x-icon" href="{{ asset('/assets/img/teacode/teacode.ico') }}">

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
        <link href="{{ asset('/plugins/bootstrap/css/bootstrap.min.css') }}" rel="preload" as="style">
        <link  href="{{ asset('/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/fontawesome/css/all.min.css') }}" rel="preload" as="style">
        <link href="{{ asset('/assets/fontawesome/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/app.css') }}" rel="preload" as="style">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        {{-- <link href="{{ asset('/css/animate.min.css') }}" rel="preload" as="style">
        <link href="{{ asset('/css/animate.min.css') }}" rel="stylesheet"> --}}
        <script defer src="{{ asset('/js/jquery.min.js') }}"></script>
        <script defer src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script defer src="{{ asset('/plugins/particles/particles.min.js') }}"></script>
        <script defer src="{{ asset('/js/app.js') }}"></script>

        {{-- <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/TweenMax-latest-beta.js"></script> --}}
        {{-- <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/MorphSVGPlugin.min.js"></script> --}}
        <title>{{ $title ?? 'TeaCode - Turning Tea into Code' }}</title>
    </head>
    <body class="antialiased">
        <div class="wrapper">
                @yield('content')
        </div>
        {{-- @include('partials.loader') --}}
        @include('partials.fb-btn')
    </body>
</html>
