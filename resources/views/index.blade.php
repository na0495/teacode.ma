@extends('layout')

@section('content')

    @include('partials.index.menu')
    <div class="container-fluid p-0">
        @include('partials.index.about')
        @include('partials.index.activities')
    </div>

    @include('partials.index.footer')
@endsection
