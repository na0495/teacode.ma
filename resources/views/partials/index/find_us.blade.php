<div id="find_us" class="find_us section-wrapper py-50px tc-white-bg">
    <div class="section">
        <div class="container">
            <div class="row align-items-center mainRow">
                <div class="col-12">
                    <div class="find-us-wrapper">
                        <ul class="list-group list-group-horizontal align-items-start">
                            @foreach ($data->socialLinks as $socialLink)
                                <li class="list-group-item border-0 overflow-auto">
                                    <a href="{{ $socialLink->link }}" target="_blank" class="text-decoration-none">
                                        <img src="{{ asset($socialLink->img) }}" alt="" class="overflow-hidden square-30">
                                        {{-- <span class="social-icon">{!! $socialLink->icon !!}</span> --}}
                                        {{-- <span class="ml-2 text-capitalize">{{ $socialLink->title }}</span> --}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
