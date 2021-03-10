@extends('layout')

@section('content')

    @include('layouts.menu')
    <div class="container-fluid p-0">
        @include('pages.index-parts.about')
        @include('pages.index-parts.activities')
    </div>

    @include('layouts.footer')
@endsection
