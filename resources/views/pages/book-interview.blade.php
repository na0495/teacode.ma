@extends('layout.page')
@section('js-before')
    <script src="https://www.google.com/recaptcha/api.js?render=6LcoEWwdAAAAAGp8RuoEUul7QmcPmz83bTOYv5Fa"></script>
@endsection
@section('page-content')
    <div class="container book-interview">
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="text-center tc-blue-dark-1 mb-5">Book Interview</h2>
            </div>
        </div>
        <div class="row mt-3 mb-5">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="availabilities">
                    <form id="booking-form" action="{{ route('interview.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="username mb-4">
                            <h5 class="mb-2"><i class="far fa-user"></i> Discord username :</h5>
                            <div class="input-group flex-nowrap mb-4">
                                <span class="input-group-text" id="addon-wrapping">@</span>
                                <input id="username" type="text" class="form-control masked" placeholder="username#1234" name="username"
                                    aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                        </div>
                        <div class="dates mb-4">
                            <h5 class="mb-1"><i class="far fa-clock"></i> Availabilities :</h5>
                            <ul class="list-group align-items-start">
                                @foreach ($data->availabilities as $key => $item)
                                <li class="list-group-item p-1 pb-0">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input class="form-check-input m-0 me-2" type="radio" name="date" id="key-{{ $key }}" value="{{ $item->date }}">
                                        <label class="form-check-label" for="key-{{ $key }}">
                                            <span>{{ $item->_date->format('D j F') }}</span>
                                            <span>|</span>
                                            <span>{{ $item->start }} - {{ $item->end }}</span>
                                        </label>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="mb-4">
                            <label for="formFile" class="form-label h5 file-box" id="file-box">
                                <span class="file-box-txt">Drop your resume here to upload</span>
                                <input class="form-control d-none" type="file" name="resume-file" id="formFile" accept=".pdf, .docx, .doc">
                            </label>
                        </div>
                        {{-- <div class="reCaptcha">
                            <button class="g-recaptcha form-control btn tc-blue-bg booking-btn"
                                data-sitekey="6LcoEWwdAAAAAGp8RuoEUul7QmcPmz83bTOYv5Fa"
                                data-callback='onSubmit'
                                data-action='submit'>Submit</button>
                        </div> --}}
                        <div class="btn-actions mb-4">
                            <button type="submit" class="form-control btn tc-blue-bg booking-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('addons')
    @include('addons.notification')
@endsection
