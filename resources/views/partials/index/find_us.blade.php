<div id="find_us" class="find_us section-wrapper">
    <div class="section">
        <div class="container">
            <div class="row align-items-center mainRow">
                <div class="col-lg-6 col-md-7">
                    <h2 class="text-capitalize">find us</h2>
                    <p></p>
                    <div class="find-us-wrapper mt-5">
                        <ul class="list-group align-items-start">
                            @foreach ($data->find_us as $socialLink)
                                <li class="list-group-item">
                                    <a href="{{ $socialLink->link }}" target="_blank" class="text-decoration-none">
                                        <img src="{{ asset($socialLink->icon) }}" alt="" class="rounded-circle overflow-hidden square-50">
                                        <span class="ml-2 text-capitalize">{{ $socialLink->title }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="img-wrapper">
                        <img class="img-fluid" src="{{ asset('/assets/img/index/workshops.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
