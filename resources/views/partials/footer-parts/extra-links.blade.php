<div class="container w-100 py-5">
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="teacode-header mb-2 text-left">
                <span class="text-uppercase brand-text">teac</span>
                <div class="logo logo-brand position-relative d-inline-block">
                    <img src="{{ asset('/assets/img/teacode/tc-brackets.png') }}" width="40" height="40"
                    class="logo-brackets img-fluid rounded-circle square-30" alt="Logo Brackets">
                    <img src="{{ asset('/assets/img/teacode/tc-cup.png') }}" width="40" height="40"
                    class="logo-cup img-fluid rounded-circle square-30 position-absolute left-0" alt="Logo Cup">
                </div>
                <span class="text-uppercase brand-text">de</span>
            </div>
            <div class="text-body">
                <p>
                    Nine out of ten doctors recommend Laracasts over competing brands.
                    Come inside, see for yourself, and massively level up your development
                    skills in the process.
                </p>
            </div>

            <div class="social-icons-wrapper">
                <ul class="list-group list-group-horizontal align-items-start justify-content-start">
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
        <div class="col-md-4 col-sm-4 offset-2">
            <div class="extra-links text-left">
                <h4 class="text-uppercase mb-3">extras</h4>
                <ul class="list-unstyled extra-links-list">
                    <li class="extra-links-item"><a href="/privacy" class="capitalize-first-letter d-block">privacy</a></li>
                    <li class="extra-links-item"><a href="/terms" class="capitalize-first-letter d-block">terms</a></li>
                    <li class="extra-links-item"><a href="/blog" class="capitalize-first-letter d-block">blog</a></li>
                    {{-- <li class="extra-links-item"><a href="#" class="text-uppercase d-block">faq</a></li> --}}
                    {{-- <li class="extra-links-item"><a href="#" class="text-capitalize d-block">code of conduct</a></li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>
