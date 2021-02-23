@extends('layout')

@section('content')
    @include('partials.menu')

    <div class="container-fluid p-0 privacy-policy">
        <section class="p-5">
            <div class="container">
                <div class="row">
                    <div class="col-10 offset-1">
                        <h1 class="text-center">Privacy Policy</h1>
                        <p>This privacy policy discloses the privacy practices for teacode.ma.
                            This privacy policy applies solely to information collected by this web site.
                            Here is what we do:</p>
                        <p>We don't store your data, period.</p>
                        <p>We physically can't. We have nowhere to store it.
                            We don't even have a server database to store it.
                            So even if we are asked nicely to see your data, we have nothing to show.</p>
                            <p>That's why, with Ecquire, what happens on your computer stays on your computer.</p>
                        <h4>Security</h4>
                        <p>
                            Everything is encrypted in a
                            secure way. You can verify this by looking for a closed lock icon
                            at the bottom of your web browser, or looking for "https" at the
                            beginning of the address of the web page.
                        </p>
                        <h4>Links</h4>
                        <p>
                            This web site contains links to other sites. Please be aware
                            that we are not responsible for the content or privacy
                            practices of such other sites. We encourage our users to be
                            aware when they leave our site and to read the privacy
                            statements of any other site that collects personally
                            identifiable information.
                        </p>
                        <h4>Updates</h4>
                        <p>
                            Our Privacy Policy may change from time to time and all updates
                            will be posted on this page.
                        </p>
                        <p>
                            If you feel that we are not abiding by this privacy policy, you
                            should contact us immediately via email at
                            support@teacode.ma.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('partials.footer')
@endsection
