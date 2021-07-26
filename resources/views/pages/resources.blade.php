@extends('app')

@section('content')
    @include('layout.menu')

    <div class="container-fluid p-0">
        @include('pages.index-parts.about')
        <section class="p-md-5 py-5 px-4 page resources" id="resources">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-12">
                        <h2 class="text-center mb-5">Resources</h2>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-lg-10 offset-lg-1 col-12">
                        @foreach ($data->resources as $resource)
                            <div class="section mb-5">
                                <div class="section-header mb-4">
                                    <h4 class="text-capitalize">{{ $resource->title }}</h4>
                                </div>
                                <div class="section-body">
                                    @foreach ($resource->items as $item)
                                        <div class="section-block mb-4">
                                            <div class="section-block-header mb-3">
                                                <h5 class="text-capitalize">{{ $item->title }}</h5>
                                            </div>
                                            <div class="section-block-body">
                                                <ul class="list-links mb-0">
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
        </section>
    </div>

    @include('layout.footer')
@endsection
