@extends('app')

@section('content')
    @include('layout.menu')

    <div class="container-fluid p-0 rules">
        <section class="p-md-5 mt-5 py-5 px-4" id="rules">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-12">
                        <h1 class="text-center mb-5">Rules of the server</h1>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-lg-10 offset-lg-1 col-12">
                        <p class="mb-3">By signing up and interacting on this server, you agree to follow/respect the code of conduct.
                        Any violations of the code of conduct may result in a kick or temporary ban at the moderators discretion.</p>
                        <blockquote>
                            <ol>
                                <li> Follow the Discord Community Guidelines (<a href="https://discord.com/guidelines">https://discord.com/guidelines</a>).</li>
                                <li> Be kind, Be respectful, Be considerate, think about how your contribution will affect others in the community.</li>
                                <li> Treat everyone with respect. Absolutely no harassment, sexism, racism, or hate speech will be tolerated.</li>
                                <li> No spam or self-promotion (server invites, advertisements, etc) without permission from a <strong class="tc-red">@Moderators</strong>. This includes DMing fellow members.</li>
                                <li> No NSFW or obscene content. This includes text, images, or links featuring nudity, sex, hard violence, or other graphically disturbing content.</li>
                                <li> When you join any voice/text channel, please avoid saying/writing any bad words (directly or indirectly).</li>
                                <li> We keep the right to ask you to change your nickname/username/description if it's not readable or contains any bad words. </li>
                                <li> Cheating in school related stuff (exams, projects .. etc) is prohibited.</li>
                                <li> If you see something against the rules or something that makes you feel unsafe, let the <strong class="tc-blue">@Staff</strong> know. We want this server to be a welcoming space!</li>
                                <li>
                                    <p>Before asking for help or helping anyone, please read these sections  :</p>
                                    <ul>
                                        <li><p><a href="#how-to-help">How to Help ❔</a></p></li>
                                        <li><p><a href="#how-to-ask-for-help">How to Ask for Help ❔</a></p></li>
                                    </ul>
                                </li>
                                <li> You can find information and answers for FAQ (Frequently Asked Questions) here <a href="#">📘・infos-and-faq</a></li>
                            </ol>
                            <p>Last Update : September 1st, 2021</p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </section>
        <hr class="separator">
        @include('pages.how-to-help')
        <hr class="separator">
        @include('pages.how-to-ask-for-help')
    </div>

    @include('layout.footer')
@endsection
