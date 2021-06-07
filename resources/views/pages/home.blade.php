@extends('app')
@section('title')
    Home
@endsection
@section('content')
<div class="row fullscreen">
    <div class="col-md-6 col">
        <div class="text-center txt-wrapper btn btn-light">
            <a href="/ar" class="btn fullscreen text-capitalize">Arabic content</a>
        </div>
    </div>
    <div class="col-md-6 col">
        <div class="text-center txt-wrapper btn btn-light">
            <a href="/en" class="btn fullscreen text-capitalize">English content</a>
        </div>
    </div>
</div>
@endsection
