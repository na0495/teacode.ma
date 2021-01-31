<div id="find_us" class="find_us section-wrapper py-50px">
    <div class="section">
        <div class="container">
            <div class="row align-items-center mainRow">
                <div class="col-12">
                    <h3 class="text-capitalize text-center mb-5">find us</h3>
                    <div class="find-us-wrapper mt-4">
                        <ul class="list-group list-group-horizontal align-items-start">
                            @foreach ($data->find_us as $socialLink)
                                <li class="list-group-item border-0 overflow-auto">
                                    <a href="{{ $socialLink->link }}" target="_blank" class="text-decoration-none">
                                        <img src="{{ asset($socialLink->img) }}" alt="" class="overflow-hidden square-70">
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
