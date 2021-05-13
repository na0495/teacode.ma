@extends('layout')

@section('content')

    @include('layouts.menu')
    <div class="container-fluid p-0">
        @include('pages.index-parts.about')
        <div id="videos" class="py-5 px-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="video-preview">
                            <div class="watch">
                                <iframe width="100%" height="315"
                                src="https://www.youtube.com/embed/{{ $data->currentVideo->id }}?{{ $data->currentVideo->params }}" 
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; 
                                clipboard-write; encrypted-media; 
                                gyroscope; picture-in-picture" 
                                allowfullscreen></iframe>
                            </div>
                            <div class="description">
                                {!! nl2br(e($data->currentVideo->description)) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 mt-lg-0 mt-5">
                        <div class="video-list">
                            <ul class="list-group align-items-start">
                                @foreach ($data->results as $result)
                                <li class="list-group-item">
                                    <a href="/_api/youtube/{{ $result->videoId }}">
                                        <div class="video-data">
                                            <div class="video-cover">
                                                <div class="video-duration">
                                                    <span>{{ $result->videoDuration }}</span>
                                                </div>
                                                <img src="{{ $result->cover->maxres->url }}" 
                                                style="width: 100px; height: 56px"
                                                width="{{ $result->cover->standard->width }}" height="{{ $result->cover->standard->height }}"
                                                alt="">
                                            </div>
                                            <div class="video-metadata ml-2">
                                                <div class="video-title">
                                                    {{ $result->videoTitle }}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                @foreach ($data->results as $result)
                                <li class="list-group-item">
                                    <a href="/_api/youtube/{{ $result->videoId }}">
                                        <div class="video-data">
                                            <div class="video-cover">
                                                <div class="video-duration">
                                                    <span>{{ $result->videoDuration }}</span>
                                                </div>
                                                <img src="{{ $result->cover->maxres->url }}" 
                                                style="width: 100px; height: 56px"
                                                width="{{ $result->cover->standard->width }}" height="{{ $result->cover->standard->height }}"
                                                alt="">
                                            </div>
                                            <div class="video-metadata ml-2">
                                                <div class="video-title">
                                                    {{ $result->videoTitle }}
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
        </div>
    </div>

    @include('layouts.footer')
@endsection
