@extends('layout.page')

@section('page-content')
    <div class="assets">
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="text-center tc-blue-dark-1 mb-5">Assets</h2>
            </div>
        </div>
        <div class="row mt-3 mb-5 justify-content-center">
            <div class="col-12">
                <div id='assets-wrapper'>
                    <div class="row">
                        @foreach ($files as $file)
                            <div class="col-4 mb-4">
                                <img src="{{ asset($file->webPath) }}" class="img-fluid rounded" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
