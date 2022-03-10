
<!-- Fonts -->
<link rel="preload" href="{{ asset('/webfonts/fa-solid-900.woff2') }}" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="{{ asset('/webfonts/fa-brands-400.woff2') }}" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="{{ asset('/assets/fonts/istokweb.woff2') }}" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="{{ asset('/assets/fonts/UntitledSansWeb-Bold.woff2') }}" as="font" type="font/woff2" crossorigin>

@yield('css-before')
<link href="{{ asset('/css/externals.css') }}" rel="preload" as="style">
<link href="{{ asset('/css/externals.css') }}" rel="stylesheet">
<link id="app-css-preload" href="{{ asset('/css/app.css') }}" rel="preload" as="style">
<link id="app-css" href="{{ asset('/css/app.css') }}" rel="stylesheet">
@yield('css-after')
@yield('js-before')
<script defer src="{{ asset('/js/app.js') }}"></script>
@yield('js-after')
