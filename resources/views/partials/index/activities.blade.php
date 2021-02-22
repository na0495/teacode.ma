<div id="activities" class="activities section-wrapper">
    <div class="section">
        @foreach ($data->activities as $key => $activity)
        <div class="activity-wrapper {{ $key % 2 != 0 ? '' : 'tc-grey-light-bg' }}">
            <div class="container">
                <div class="row align-items-center activity-row">
                    <div class="col-lg-6 col-md-7">
                        <h3 class="activity-header text-capitalize mb-2 tc-black-almost">
                            <span class="activity-header-icon">{!!  $activity->icon !!}</span>
                            <span class="activity-header-txt">{{ $activity->title }}</span>
                        </h3>
                        <div class="description tc-black-almost">
                            {!! $activity->description->text !!}
                            @if (isset($activity->description->list))
                                <{!! $activity->description->listType ?? 'ul' !!} class="pl-4 m-0">
                                @foreach ($activity->description->list as $listItem)
                                <li class="capitalize-first-letter">{!! $listItem !!}</li>
                                @endforeach
                                </{!! $activity->description->listType ?? 'ul' !!}>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 activity-img">
                        <div class="img-wrapper">
                            {{-- @php $activity->slug = 'mock-interview' @endphp --}}
                            @include('partials.index.svg-includes.' . $activity->slug)
                            {{-- <img class="img-fluid" src="{{ asset($activity->img) }}" alt=""> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
