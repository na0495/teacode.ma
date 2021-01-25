@extends('layout')
@section('title')
    TeaCode
@endsection
@section('content')

    @include('partials.index.menu')

    @include('partials.index.header')
    @include('partials.index.activities')
    @include('partials.index.events')
    @include('partials.index.code-of-conduct')
    @include('partials.index.faq')
    @include('partials.index.staff')

    @include('partials.index.footer')
    @include('partials.fb-btn')
@endsection
