@extends('app')

@section('content')
    @include('layout.menu')

    <div class="container-fluid p-0 contributors">
        @include('pages.index-parts.about')
        <section class="p-md-5 py-5 px-4 page" id="contributors">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-12">
                        <h2 class="text-center mb-5">Contributors</h2>
                    </div>
                </div>
                <div class="row mt-3 mb-5 justify-content-center">
                    @foreach ($data->contributors as $contributor)
                        <div class="col-lg-2 col-md-3 col-4 mb-4">
                            <div class="contributor d-flex flex-column justify-content-center align-items-center">
                                <div class="feature-img mb-2">
                                    <div class="image">
                                        <img class="w-100 m-auto d-block"
                                        src="{{ $contributor->image }}" alt="" title={{  $contributor->slug }} loading="lazy">
                                    </div>
                                    <div class="contributor-badge">{{ $contributor->badge }}</div>
                                </div>
                                <div class="text-data text-center">
                                    <div class="fullname text-capitalize white-space-nowrap">{{ $contributor->fullname }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    @include('layout.footer')
@endsection
