<footer class="page-footer tc-black-bg">
    <div class="container-fluid footer text-center p-0">
        <div class="container w-100 py-3">
            <div class="row">
                <div class="col-md-6 col-sm-6 copyright-txt">
                    <div class="copy-right">
                        <span class="copy-right-txt">
                            Copyright <i class="fas fa-copyright"></i> {{ now()->year }} |
                        </span>
                        <div class="brand d-inline-block">
                            <a href="/" class="d-flex align-items-center">
                                <div class="logo position-relative">
                                    <img src="{{ asset('/assets/img/teacode/tc-brackets.png') }}" width="40" height="40"
                                    class="logo-brackets img-fluid rounded-circle square-30" alt="Logo Brackets">
                                    <img src="{{ asset('/assets/img/teacode/tc-cup.png') }}" width="40" height="40"
                                    class="logo-cup img-fluid rounded-circle square-30 position-absolute left-0" alt="Logo Cup">
                                </div>
                                <span>TeaCode.ma</span>
                            </a>
                        </div>
                    </div>
                    <div class="social-icons-wrapper">
                        <ul class="list-group list-group-horizontal align-items-start">
                            @foreach ($data->socialLinks->teacode as $socialLink)
                                <li class="list-group-item border-0 overflow-auto my-0 mx-2">
                                    <a href="{{ $socialLink->link }}" target="_blank" rel="noopener"
                                        aria-label="{{ $socialLink->title }}"
                                        class="text-decoration-none">
                                        <span class="social-icon">{!! $socialLink->icon !!}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 owner">
                    <p>Made with <span class="heart-icon"><i class="fas fa-heart"></i></span> by <span class="bold">Driss Boumlik</span></p>

                    <div class="social-icons-wrapper">
                        <ul class="list-group list-group-horizontal align-items-start">
                            @foreach ($data->socialLinks->mine as $socialLink)
                                <li class="list-group-item border-0 overflow-auto my-0 mx-2">
                                    <a href="{{ $socialLink->link }}" target="_blank" rel="noopener"
                                        aria-label="{{ $socialLink->title }}"
                                        class="text-decoration-none">
                                        <span class="social-icon">{!! $socialLink->icon !!}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
