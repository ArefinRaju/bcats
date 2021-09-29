<noscript><strong>We're sorry but This Website doesn't work properly without JavaScript enabled. Please enable
    it to
    continue.</strong></noscript>
<header>
<div class="bg-light fixed-top py-1">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container position-relative">
            <div class="logo_img navbar-brand">
                <a href="/"><img src="{{ asset('frontend/images/custom/logo.png') }}" alt="Logo"
                        class="logo"></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav menu">

                    <li class="nav-item"><a class="{{ request()->is("welcome") ? "active" : "" }}" href="{{route('welcome')}}">মূলপাতা</a></li>
                    <li class="nav-item"><a class="{{ request()->is("about") ? "active" : "" }}" href="{{route('about')}}">প্রেক্ষাপট </a></li>
                    <li class="nav-item"><a class="{{ request()->is("version-list") ? "active" : "" }}" href="{{route('faq')}}">ভার্সন লিস্ট</a></li>
                    <li class="nav-item"><a class="{{ request()->is("blog") ? "active" : "" }}" href="{{route('blog')}}">ব্লগ</a></li>
                    <li class="nav-item"><a class="{{ request()->is("contact") ? "active" : "" }}" href="{{route('contact')}}">যোগাযোগ</a></li>
                    
                    @if (Route::has('login'))
                        <div class="d-none d-md-inline-block top-btn">
                            @auth
                                <button id="login_btn" class="primary-btn text-dark support-btn disabled"><a
                                        class=" text-black font-weight-bold" style="color: black !important;"
                                        href="{{ route('login') }}"> ড্যাশবোর্ড</a></button>
                            @else
                                <a class=" text-black font-weight-bold" style="color: black !important;" href="{{ route('login') }}">
                                    <button  class="primary-btn text-dark support-btn disabled"> লগ-ইন</button>
                                </a>

                                <a class=" text-black font-weight-bold" style="color: black !important;" href="{{ route('register') }}">
                                    <button id="signup" class="primary-btn text-dark support-btn disabled"> সাইন-আপ</button>
                                </a>

                            @endauth
                        </div>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

</div>

</header>
<!-- end heder -->