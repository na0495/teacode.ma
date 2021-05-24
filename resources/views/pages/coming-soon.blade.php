@extends('layout')

@section('content')
    @include('layouts.menu')

    <div class="container-fluid p-0 contributors">
        @include('pages.index-parts.about')
        <section class="p-md-5 py-5 px-4 page" id="coming-soon">
            <div class="container">
                <div class="row">
                    <div class="fullscreen" style="height: 400px">
                        <h1 class="text-uppercase">coming soon</h1>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('layouts.footer')
@endsection
