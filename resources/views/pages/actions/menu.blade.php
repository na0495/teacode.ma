<div class="menu nav-scroller py-2 {{ $mode . '-mode' }}">
    <div class="container">
        <div class="menu-blocks d-flex justify-content-between align-items-center">
            <div class="brand turn-trigger">
                {{-- <img src="{{ asset('/assets/img/teacode/teacode.png') }}"
            class="img-fluid rounded-circle square-50" alt=""> --}}
                <a href="/" class="d-flex align-items-center">
                    <div class="logo logo-brand position-relative d-inline-block">
                        <img src="{{ asset('/assets/img/teacode/teacode_circle_bordred_200.png') }}" width="30"
                            height="30" class="logo turn img-fluid rounded-circle square-35" alt="Logo">
                    </div>
                    <h4 class="brand-txt ms-2 d-inline-block ">TeaCode</h4>
                </a>
            </div>
            <nav class="nav d-flex justify-content-center">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                @else
                    <div class="" aria-labelledby="navbarDropdown">
                        <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            Logout <i class="fas fa-power-off"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endguest
            </nav>
        </div>
    </div>
</div>
