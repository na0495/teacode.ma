@extends('layout.page')

@section('page-content')
    <div class="faq">
        <div class="row mt-5">
            <div class="col-12">
                <h1 class="text-center mb-5">Frequently Asked Questions (FAQs)</h1>
            </div>
        </div>
        @foreach (getFaqSections() as $key => $faqSection)
            @include('pages.faq.' . $faqSection, ['index' => $key])
        @endforeach
    </div>
@endsection
