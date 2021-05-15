@extends('layout')

@section('content')
    @include('layouts.menu')

    <div class="container-fluid p-0 contributors">
        @include('pages.index-parts.about')
        <section class="p-md-5 py-5 px-4 page">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center mb-5">Contributors</h2>
                    </div>
                </div>
                <div class="row mt-3">
                    @foreach ($data->contributors as $contributor)
                        <div class="col-lg-2 col-md-3 col-4 mb-4">
                            <div class="contributor d-flex flex-column justify-content-center align-items-center">
                                <div class="image mb-2">
                                    <img class="w-100 m-auto d-block rounded-circle" 
                                    src="{{ $contributor->image }}" alt="">
                                </div>
                                <div class="text-data text-center">
                                    <div class="fullname text-capitalize">{{ $contributor->fullname }}</div>
                                    <div class="role text-capitalize">{{ $contributor->role }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    @include('layouts.footer')
@endsection
