@extends('layout')
@section('title') TeaCode @endsection
@section('content')
<div class="ar fullscreen">
    {{-- @include('partials.back-btn') --}}
    <div class="row fullscreen">
        @foreach ($content['items'] as $item)
        <div class="col-md-4 col">
            <div class="text-center txt-wrapper {{ implode(' ', $item['classes']) }}">
                <a href="{{ $item['link'] }}" target="_blank" class="btn capitalize-first-letter text-white fullscreen">{{ $item['text'] }}</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
