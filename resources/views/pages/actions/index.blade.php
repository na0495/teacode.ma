@extends('pages.actions.app')
@section('js-after')
    <script defer src="{{ asset('/js/admin.app.js') }}"></script>
@endsection
@section('actions-content')
    <div class="row mt-5">
        <div class="col-12">
            <h1 class="text-center mb-5">Actions</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
            <div class="accordion" id="accordionExample">
                @foreach ($actions as $i => $action)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button {{ $i ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse"
                                data-bs-target="#{{ $action['slug'] }}" aria-expanded="true" aria-controls="{{ $action['slug'] }}">
                                {{  $action['header']  }}
                            </button>
                        </h2>
                        <div id="{{ $action['slug'] }}" class="accordion-collapse collapse {{ $i ? '' : 'show' }}" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                @include('pages.actions.partials.' . $action['slug'])
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
