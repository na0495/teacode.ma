@extends('layout.page')

@section('page-content')
    <div class="feedback">
        <div class="row mt-5">
            <div class="col-12">
                <h1 class="text-center mb-5">Give us your feedback</h1>
            </div>
        </div>
        <div class="row my-3">
            <div class="iframe-container">
                <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScxO9ewWCSSo5mmbQyW-lbWxcHDJHqtMitZqf4C5yVLIhC7vA/viewform?embedded=true"
                width="100%" height="382" frameborder="0" marginheight="0" marginwidth="0"
                >Loading…</iframe>
            </div>
        </div>
    </div>
@endsection
