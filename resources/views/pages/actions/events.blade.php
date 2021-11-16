@extends('auth.app')

@section('content')
    @include('pages.actions.menu')
    <div class="container my-5 actions">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <ul class="list-group align-items-start">
                    @foreach ($events as $e)
                        <li class="list-group-item"><a href="/pages/events/{{ $e->id }}" target="_blank">{{ $e->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
