@extends('layout.page')
@section('meta-extra')
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
@endsection
@section('js-after')
    <script defer src="{{ asset('/js/admin.app.js') }}"></script>
@endsection
@section('page-content')
    <div class="container book-interview">
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="text-center tc-blue-dark-1 mb-3">
                    Book a <a href="https://www.talentlyft.com/en/resources/what-is-mock-interview"
                        target="_blank" class="text-decoration-underline tc-blue-dark-1">Mock Interview</a></h2>
            </div>
        </div>
        <div class="row mt-3 mb-5">
            <div class="col-12 col-md-8 offset-md-2 text-center">
                <div class="intro mb-4">
                    <p class="h5">
                        <span class="d-block" dir="rtl">إلى كنتي باغي تدرب على les entretiens عمر هاد الفورم</span>
                        <span class="d-block" dir="rtl">باش تعرف شوف هاد الرابط <a href="https://www.talentlyft.com/en/resources/what-is-mock-interview" target="_blank">Mock Interview</a></span>
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">
                <div class="availabilities">
                    <form id="booking-form" action="{{ route('interview.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="username mb-4">
                            <h5 class="mb-2"><i class="fas fa-at"></i> Email: </h5>
                            <div class="input-group flex-nowrap mb-4">
                                <span class="input-group-text" id="addon-wrapping">@</span>
                                <input id="email" type="text" class="form-control masked" placeholder="example@mail.com" name="email"
                                    aria-label="Username" aria-describedby="addon-wrapping" required>
                            </div>
                        </div>
                        <div class="dates mb-4">
                            <h5 class="mb-1"><i class="fas fa-calendar-alt"></i> Availabilities :</h5>
                            <ul class="list-group align-items-start">
                                @foreach ($data->availabilities as $key => $item)
                                <li class="list-group-item p-1 pb-0">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input class="form-check-input m-0 me-2" type="radio" name="date" id="key-{{ $key }}" value="{{ $item->day }}" required>
                                        <label class="form-check-label" for="key-{{ $key }}">
                                            <span>{{ $item->day }}</span>
                                            <span>|</span>
                                            <span>{{ $item->day_ar }}</span>
                                        </label>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="mb-4">
                            <label for="resume-file" class="form-label h5 file-box" id="file-box">
                                <span class="file-box-txt">Drop your CV here to upload</span>
                                <input class="form-control d-none" type="file" name="resume-file" id="resume-file" accept=".pdf, .docx, .doc">
                            </label>
                        </div>
                        <div class="mb-4 position-relative">
                            {!! htmlFormSnippet() !!}
                        </div>
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
