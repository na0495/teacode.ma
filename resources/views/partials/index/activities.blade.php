<div id="activities" class="activities section-wrapper">
    <div class="section">
        <div class="container">
            <div class="row align-items-center mainRow">
                <div class="col-lg-6 col-md-7">
                    <h2 class="text-capitalize">activities</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae commodi iusto consequuntur facere.
                        Qui fugiat aut vitae quas sint voluptatibus dolor.
                    </p>
                    <div class="activities-wrapper mt-5">
                        @foreach ($data->activities as $activity)
                        <div class="block-wrapper mb-5">
                            <div class="block-header">
                                <div class="icon d-inline">{!! $activity->icon !!}</div>
                                <h4 class="block-header-txt d-inline ml-2">{{ $activity->title }}</h4>
                            </div>
                            <div class="block-body mt-1 ml-4">
                                <p class="block-body-txt">{{ $activity->description }}</p>
                            </div>
                        </div>
                        @endforeach
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
