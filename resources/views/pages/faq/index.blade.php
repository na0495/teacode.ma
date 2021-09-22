@extends('app')

@section('content')
    @include('layout.menu')

    <div class="container-fluid p-0 faq">
        <section class="p-md-5 mt-5 py-5 px-4" id="faq">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-12">
                        <h1 class="text-center mb-5">Frequently Asked Questions (FAQs)</h1>
                    </div>
                </div>
                @foreach (getFaqSections() as $key => $faqSection)
                    @include('pages.faq.' . $faqSection, ['index' => $key])
                @endforeach
            </div>
        </section>
    </div>

    @include('layout.footer')
@endsection
