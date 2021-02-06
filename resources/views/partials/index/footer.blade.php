<footer class="page-footer">
    <div class="container-fluid footer text-center not">
        <div class="container w-100 py-3">
            <div class="row">    <!-- row-eq-height"> -->
                <div class="col-md-6 col-sm-6 copyright-txt">
                    <div>Copyright <i class="fas fa-copyright"></i> {{ now()->year }} |
                        <div class="brand d-inline-block">
                            {{-- <img src="{{ asset('/assets/img/teacode/teacode.png') }}"
                            class="img-fluid rounded-circle square-30" alt=""> --}}
                            <a href="/" class="d-flex align-items-center">
                                <div class="logo position-relative">
                                    <img src="{{ asset('/assets/img/teacode/tc-brackets.png') }}"
                                    class="logo-brackets img-fluid rounded-circle square-30" alt="">
                                    <img src="{{ asset('/assets/img/teacode/tc-cup.png') }}"
                                    class="logo-cup img-fluid rounded-circle square-30 position-absolute left-0" alt="">
                                </div>
                                <span>TeaCode.ma</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 owner">
                    <p>Made with <i class="fas fa-heart"></i> by <span class="bold">Driss Boumlik</span></p>
                </div>
            </div>
        </div>
    </div>
</footer>
