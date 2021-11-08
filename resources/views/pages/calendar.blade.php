@extends('app')

@section('content')
    @include('layout.menu')

    <div class="container-fluid p-0 contributors">
        @include('pages.index-parts.about')
        <section class="p-md-5 py-5 px-4 page" id="calendar">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-12">
                        <h2 class="text-center tc-blue-dark-1 mb-5">Calendar</h2>
                    </div>
                </div>
                <div class="row mt-3 mb-5 justify-content-center">
                    <div class="col-12">
                        <div id='calendar-wrapper'></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade animate__animated" id="event-detail" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close ms-auto" data-dismiss="modal" aria-label="Close">
                            <i class="far fa-times-circle"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer d-none">
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('layout.footer')
@endsection
