@extends('app')
@section('title')
    My links
@endsection
@section('content')
    <div class="row fullscreen w-auto">
        @include('partials.back-btn')
        <div class="col-12 d-flex justify-content-center align-items-center">
            <ul class="list-group flex-row m-0">
                @foreach ($links as $link)
                <li class="list-group-item link">
                    <a href="{{ $link['link'] }}" target="_blank" title="{{ $link['title'] }}">
                        <img src="{{ $link['img'] }}" alt="">
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

