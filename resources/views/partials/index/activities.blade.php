<div id="activities" class="activities section-wrapper">
    <div class="section">
        @foreach ($data->activities as $activity)
        <div class="activity-wrapper">
            <div class="container">
                <div class="row align-items-center activity-row">
                    <div class="col-lg-6 col-md-7">
                        <h3 class="text-capitalize mb-2 tc-blue">{{ $activity->title }}</h3>
                        <p class="">{!! $activity->description !!}.</p>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="img-wrapper">
                            <img class="img-fluid" src="{{ asset($activity->img) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
