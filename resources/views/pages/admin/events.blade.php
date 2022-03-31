@extends('pages.admin.app')

@section('actions-content')
    <div class="row mt-5">
        <div class="col-12">
            <h1 class="text-center mb-5">Events</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
            <ul class="list-group align-items-start">
                @foreach ($events as $e)
                    <li class="list-group-item"><a href="{{ route('events.get', $e->id) }}" target="_blank">{{ $e->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
