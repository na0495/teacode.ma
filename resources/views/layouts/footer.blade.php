<footer class="page-footer">
    <div class="container-fluid footer text-center">
        @if (env('APP_ENV') != 'production')
            @include('layouts.footer-parts.footer-menu')
            <hr class="footer-separator">
        @endif
        @include('layouts.footer-parts.extra-data')
        <hr class="footer-separator">
        @include('layouts.footer-parts.copy-right')
    </div>
</footer>
