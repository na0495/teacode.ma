@extends('auth.app')

@section('content')
    @include('pages.actions.menu')
    <div class="container my-5 actions">
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
                                    @include('pages.actions.' . $action['slug'])
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
