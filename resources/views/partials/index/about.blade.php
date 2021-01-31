<div id="about" class="about section-wrapper py-80px">
    <div class="section blog-header">
        <div class="row justify-content-center align-items-center mb-3">
            <div class="col-12 text-center d-flex justify-content-center align-items-center">
                <h2 class="blog-header-logo text-dark d-inline-block mb-0">TeaCode</h2>
                <img src="{{ asset('/assets/img/teacode/teacode.png') }}"
                class="img-fluid rounded-circle square-75 ml-2" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2 p-1">
                <div class="welcom-message">
                    <div class="welcom-message-wrapper">
                        <div class="welcome text-capitalize"><span>welcome</span></div>
                        <div class="txt"><span>Whether you are learning to code or looking for an internship/job in software development</span></div>
                        <div class="goal"><span>We are here to help you with god's grace</span></div>
                    </div>
                </div>
                <div class="find-us-wrapper mt-5">
                    <h4 class="capitalize-first-letter text-center mb-3">you cand find us here</h4>
                    <ul class="list-group list-group-horizontal align-items-start">
                        @foreach ($data->find_us as $socialLink)
                            <li class="list-group-item border-0 overflow-auto">
                                <span class="link-wrapper d-inline-block ml-3">
                                    <a href="{{ $socialLink->link }}" target="_blank" class="text-decoration-none" style="color: {!! $socialLink->color !!}">
                                        {{-- <img src="{{ asset($socialLink->icon) }}" alt="" class="rounded-circle overflow-hidden square-40"> --}}
                                        {!! $socialLink->icon !!}
                                        <span class="ml-1 text-capitalize">{{ $socialLink->title }}</span>
                                    </a>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

