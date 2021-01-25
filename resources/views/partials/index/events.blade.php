<div id="events" class="section events">
    <div class="container">
        <div class="row">
            @foreach ($data['events'] as $event)
            <div class="col-lg-4 col-md-6">
                <div class="event h-100">
                    <div class="card h-100">
                        <img src="{{ $event->img }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p>Date/Time : {{ $event->date .' | '. $event->time }}</p>
                            <p class="text-capitalize">{!! $event->type .' | '. $event->place !!}</p>
                            <p class="card-text">
                                <pre class="white-space-pre-wrap ff-primary">{{ $event->description }}</pre>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
