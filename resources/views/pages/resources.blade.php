@extends('layout')

@section('content')
    @include('layouts.menu')

    <div class="container-fluid p-0">
        @include('pages.index-parts.about')
        <div class="resources py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 col-12">
                        @foreach ($data->resources as $resource)
                            <div class="section">
                                <div class="section-header">
                                    <h4 class="text-capitalize mb-4">{{ $resource->title }}</h4>
                                </div>
                                <div class="section-body">
                                    @foreach ($resource->items as $item)
                                        <div class="section-block">
                                            <div class="section-block-header">
                                                <h5 class="text-capitalize mb-3">{{ $item->title }}</h5>
                                            </div>
                                            <div class="section-block-body">
                                                <ul class="list-links">
                                                    @foreach ($item->links as $link)
                                                        <li class="list-link">
                                                            <div class="list-link-txt">
                                                                <a href="{{ $link->href }}" target="_blank" rel="noopener noreferrer"
                                                                    class="text-capitalize">{{ $link->title }}</a>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
