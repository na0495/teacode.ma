<div class="footer-menu-wrapper container w-100 py-4">
    <div class="row">
        <div class="col-12 col-md-8 col-lg-8 offset-md-2 offset-lg-2">
            <div>
                <ul class="footer-menu list-group list-group-horizontal align-items-start">
                    @foreach ($data->menuFooter as $link)
                        @if (!isset($link->hidden) || !$link->hidden)
                            <li class="footer-menu-item list-group-item border-0 overflow-auto my-0 mx-3">
                                <a href="/{{ $link->slug }}" target="_blank" rel="noopener"
                                    aria-label="{{ $link->title }}" class="text-capitalize">
                                    {{ $link->title }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
