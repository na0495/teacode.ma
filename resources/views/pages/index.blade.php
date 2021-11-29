@extends('layout.app')

@section('content')

    @include('layout.menu')
    <div class="container-fluid p-0">
        @include('pages.index-parts.about')
        @include('pages.index-parts.activities')
    </div>

    @include('layout.footer')
@endsection
