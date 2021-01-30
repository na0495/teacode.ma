@extends('layout')
@section('title')
    TeaCode
@endsection
@section('content')

    @include('partials.index.menu')
    @foreach ($data->keys as $item)
        @include('partials.index.' . $item->slug)
    @endforeach
    {{-- @include('partials.index.about') --}}
    {{-- @include('partials.index.activities') --}}
    {{-- @include('partials.index.events') --}}
    {{-- @include('partials.index.faq') --}}
    {{-- @include('partials.index.code-of-conduct')
    @include('partials.index.staff') --}}

    @include('partials.index.footer')
    {{-- @include('partials.fb-btn') --}}
@endsection
