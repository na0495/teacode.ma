@extends('app')

@section('content')
    @include('layout.menu')
    <div class="container-fluid p-0 feedback">
        <section class="p-md-5 mt-5 py-5" id="rules">
            <div class="container">
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
        </section>
    </div>

    @include('layout.footer')
@endsection
