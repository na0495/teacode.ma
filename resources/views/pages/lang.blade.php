@extends('layout')
@section('title') TeaCode @endsection
@section('content')
<div class="ar fullscreen">
    {{-- @include('partials.back-btn') --}}
    @include('partials.message')
    <div class="row w-100 items-wrapper">
        @foreach ($content['items'] as $item)
        <div class="col-lg-{{ 12/count($content['items']) }} col-md-6 col my-md-3">
            <div class="text-center txt-wrapper {{ implode(' ', $item['classes']) }}">
                <a href="{{ $item['link'] }}" target="_blank" class="item-link btn capitalize-first-letter text-white fullscreen"
                    {{-- style="background-image: url({{ $item['img'] }})" --}}
                    >
                    <img src="{{ $item['img'] }}" alt="" class="icon w-100">
                    <span class="item-link-txt">{!! $item['text'] !!}</span>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
