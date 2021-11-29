@extends('layout.page-content')

@section('page-content')
    <div class="container posts">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2
                            col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 mb-4 post">
                <div class="post-image mb-3">
                    <img src="/storage/{{ $data->post->image }}" alt=""
                            class="w-100">
                </div>
                <div class="post-title mb-3">
                    <h2 class="font-weight-bolder">{{ $data->post->title }}</h2>
                </div>
                <div class="post-meta-data">
                    <div class="post-date">
                        <i class="far fa-clock"></i>
                        {{ $data->post->updated_at->format('j F Y') }}
                    </div>
                    @if ($data->post->meta_keywords)
                    @php $tags = explode(' ', $data->post->meta_keywords) @endphp
                        <div class="post-tags mb-3">
                            @foreach ($tags as $tag)
                                <div class="post-tag d-inline-block me-2">
                                    <i class="fas fa-tag fs-small"></i>
                                    <a href="/tags/{{ $tag }}">
                                        <span>{{ $tag }}</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="post-content mt-3">
                    {!! $data->post->body !!}
                </div>
            </div>
        </div>
    </div>
@endsection
