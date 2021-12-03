@extends('layout.app')

@section('content')
    @include('layout.menu')
    <div class="container-fluid p-0">
        @include('pages.index-parts.about')
        <section class="p-md-5 py-5 px-2 page-content" id="page-content">
            <div class="container">
                @yield('page-content')
            </div>
        </section>
    </div>
    @yield('addons')
    @include('layout.footer')
@endsection
