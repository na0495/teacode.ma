@extends('layout.app')

@section('content')
    @include('layout.menu')

    <div class="container-fluid p-0">
        <section class="p-md-5 py-5 px-4 page" id="page">
            <div class="container">
                @yield('page-content')
            </div>
        </section>
    </div>
    @yield('addons')
    @include('layout.footer')
@endsection
