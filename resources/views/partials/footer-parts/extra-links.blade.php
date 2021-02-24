<div class="extra-links-wrapper container w-100 pt-5 pb-md-5 pb-4">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="teacode-header brand turn-trigger mb-2 d-inline-block">
                <span class="text-uppercase brand-text">teac</span>
                <div class="logo logo-brand position-relative d-inline-block">
                    <img src="{{ asset('/assets/img/teacode/teacode_white_bg.png') }}" width="30" height="30"
                    class="logo turn img-fluid rounded-circle square-25" alt="Logo">
                </div>
                <span class="text-uppercase brand-text">de</span>
            </div>
            <div class="text-body">
                <p>
                    As human being, we love bringing value to ourselves and to others.
                    Join us and level up your development skills in the process,
                    or give 15 to 30min of your time to help others who need it, a value is added in both ways.
                </p>
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
        <div class="col-12 col-md-4 offset-md-2">
            <div class="extra-links">
                <h4 class="text-uppercase mb-3">extras</h4>
                <ul class="list-unstyled extra-links-list">
                    <li class="extra-links-item"><a href="/blog" class="capitalize-first-letter">blog</a></li>
                    <li class="extra-links-item"><a href="/privacy" class="capitalize-first-letter">privacy</a></li>
                    <li class="extra-links-item"><a href="/terms" class="capitalize-first-letter">terms</a></li>
                    {{-- <li class="extra-links-item"><a href="#" class="text-uppercase d-block">faq</a></li> --}}
                    {{-- <li class="extra-links-item"><a href="#" class="text-capitalize d-block">code of conduct</a></li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>
