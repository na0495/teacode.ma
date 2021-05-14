<li class="list-group-item video-item w-100">
    <a href="/videos/{{ $result->videoId }}">
        <div class="video-data">
            <div class="video-cover align-items-start">
                {{-- <div class="video-duration">
                    <span>{{ $result->videoDuration }}</span>
                </div> --}}
                {{-- <img src="{{ $result->cover->maxres->url }}" 
                style="width: 100px; height: 56px"
                width="{{ $result->cover->standard->width }}" height="{{ $result->cover->standard->height }}"
                alt=""> --}}
                <div class="video-icon">
                    <i class="fab fa-youtube"></i>
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