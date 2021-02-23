@extends('layout')

@section('content')

    @include('partials.menu')
    <div class="container-fluid p-0">
        @include('pages.index.about')
        @include('pages.index.activities')
    </div>

    @include('partials.footer')
@endsection
