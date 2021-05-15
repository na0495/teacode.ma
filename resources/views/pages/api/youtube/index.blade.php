@extends('layout')

@section('content')
    @include('layouts.menu')

    <div class="container-fluid p-0 videos">
        @include('pages.index-parts.about')
        <section class="py-5 px-4 page">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="video-preview">
                            <div class="watch">
                                <iframe
                                src="https://www.youtube.com/embed/{{ $data->currentVideo->id }}?{{ $data->currentVideo->params }}" 
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; 
                                clipboard-write; encrypted-media; 
                                gyroscope; picture-in-picture" 
                                allowfullscreen></iframe>
                            </div>
                            {{-- // TODO Add chapters clicking (js) --}}
                            <div class="video-description px-4 py-4">
                                {!! nl2br(_($data->currentVideo->description)) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 mt-lg-0 mt-5">
                        <div class="video-list">
                            <ul class="list-group align-items-start">
                                @foreach ($data->results as $result)
                                <li class="list-group-item video-item w-100 {{ $data->currentVideo->id == $result->videoId ? 'active' : '' }}">
                                    <a href="/videos/{{ $result->videoId }}">
                                        <div class="video-data">
                                            <div class="video-cover align-items-start">
                                                <div class="video-icon">
                                                    <i class="fas fa-play"></i>
                                                </div>
                                            </div>
                                            <div class="video-metadata ml-2">
                                                <div class="video-title">
                                                    {{ \Str::limit($result->videoTitle, 50, '...') }}
                                                </div>
                                                <div class="video-datetime">
                                                    {{ $result->publishedAt }}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('layouts.footer')
@endsection
