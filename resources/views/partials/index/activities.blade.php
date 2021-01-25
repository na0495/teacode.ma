<div id="activities" class="section activities">
    <div class="container">
        <div class="row">
            @foreach ($data['activities'] as $activity)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
                <div class="activity h-100">
                    <div class="card h-100">
                        <img src="{{ $activity->img }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $activity->title }}</h5>
                            <p class="card-text">{{ $activity->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
