<!DOCTYPE html>
<html lang="en">

<head>
    <title>এডমিশন | আমার স্টুডেন্ট</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/admission/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/admission/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/admission/css/owl.theme.default.min.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="{{ asset('frontend/admission/css/jssor.slider.css') }}" />
    <script src="{{ asset('frontend/admission/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/admission/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('frontend/admission/js/jssor.slider-28.1.0.min.js') }}"></script>
    <script src="{{ asset('frontend/admission/js/jssor.slider.js') }}"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500&display=swap" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/4b5d72e539.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/frontend/admission/css/style.min.css') }}" />

    <!-- END: Custom CSS-->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <style>
        .admission-list a {
            padding: 9px 17px !important;
            background-color: rgb(152 0 255)
        }

    </style>
    </style>
</head>

<body>
    <i id="scrollTop" class="fas fa-arrow-up" onclick="scrollToTop()"></i>

    <header>
        <div class="bg-light fixed-top py-1">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container position-relative">
                    <div class="logo_img navbar-brand">
                        <a href="/"><img src="{{ asset('frontend/images/logo.png') }}" alt="Logo"
                                class="logo"></a>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav menu">

                            <li class="nav-item"><a class=""
                                    href="
                                    {{ route('welcome') }}">মূলপাতা</a></li>
                            <li class="nav-item"><a href="{{ route('about') }}">প্রেক্ষাপট </a></li>
                            <li class="nav-item"><a href="{{ route('faq') }}">ভার্সন লিস্ট</a></li>
                            <li class="nav-item"><a href="{{ route('blog') }}">ব্লগ</a></li>
                            <li class="nav-item"><a href="{{ route('contact') }}">যোগাযোগ</a></li>

                            @if (Route::has('login'))
                                <div class="d-none d-md-inline-block top-btn">
                                    @auth
                                        <button id="login_btn" class="primary-btn text-dark support-btn"
                                            style="background-color: #c679e3;"><a
                                                class=" text-black font-weight-bold disabled"
                                                style="color: rgb(255, 255, 255) !important;"
                                                href="{{ route('login') }}">
                                                ড্যাশবোর্ড</a></button>
                                    @else
                                        <a class=" text-black font-weight-bold" style="color: black !important;"
                                            href="{{ route('login') }}">
                                            <button id="login_btn" class="primary-btn text-dark support-btn disabled">
                                                লগ-ইন</button>
                                        </a>
                                        <a class=" text-black font-weight-bold" style="color: black !important;"
                                            href="{{ route('register') }}">
                                            <button id="signup" class="primary-btn text-dark support-btn disabled">
                                                সাইন-আপ</button>
                                        </a>

                                    @endauth
                                </div>
                            @endif

                            <li class="nav-item admission-list"><a class=" text-white"
                                    href="{{ route('admission') }}">এডমিশন</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <section class="faq-area ptb-80 mt-5 login-page">
        <div class="container">
            <div class="row">
                <div class="col-md-5 position-relative card_wrapper">

                    <div id="id_search" class="login-input card_view faq-accordion col-md-5">
                        <form action="{{ route('coaching-admission-search') }}" method="get">

                            <p>কোচিং এ ভর্তি হতে কোচিং আইডি দিন</p>
                            <div class="input-box">
                                <label for="email">ID</label>
                                <input id="coaching_no" type="number" name="coaching_no" id="coaching_no"
                                    placeholder="example:836482">
                            </div>

                            <button type="submit" class="d-block text-center my-0 sign-in-btn rounded">Search</button>
                        </form>
                    </div>

                    <div id="form_section" class="login-input card_view faq-accordion">
                        <form action="">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-5 mb-3">
                                    <p for="email">কোচিং আইডি:</p>
                                    <p for="mobile">মোবাইল:</p>
                                    <p for="salary">বেতনের ধরণ:</p>
                                    <p for="address">ঠিকানা:</p>
                                </div>
                                <div class="mb-3">
                                    <p for="email">কোচিং এর নাম:</p>
                                    <p for="mobile">কোচিং:</p>
                                    <p for="salary">বেতন:</p>
                                    <p for="address">সময়:</p>
                                </div>
                            </div>
                            <a href="javascript:void(0)"
                                onclick="searchBtn(false,'form_section','id_search','bottom_input')"
                                class="d-block text-center my-0 sign-in-btn rounded">Back</a>
                        </form>
                    </div>

                </div>


                <div class="col-md-7">
                    <div class="faq-accordion position-relative">

                        <div class="faq">
                            <div id="toggleBtn1" class="accordion__item">
                                <div class="accordion__title">
                                    <div>
                                        <span class="icon"><i class="fas fa-plus"></i></span>
                                        <p class="text">আমি কিভাবে শুরু করতে পারি?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="toggleText" id="toggleText1">
                                <p>
                                    আমার ক্লায়েন্ট ব্যবহার করার জন্য আপনাকে অবশ্যই নিবন্ধন করতে হবে
                                    নিবন্ধন আপনি মোবাইল অ্যাপ ব্যবহার করে বা ওয়েব সাইট ব্রাউজ করে
                                    কম্পিউটারের মাধ্যমে খুব সহজেই করতে পারবেন ।
                                </p>
                            </div>

                            <div id="toggleBtn2" class="accordion__item">
                                <div class="accordion__title">
                                    <div>
                                        <span class="icon"><i class="fas fa-plus"></i></span>
                                        <p class="text">আমাকে প্রতি মাসে কত পেমেন্ট করতে হবে ?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="toggleText" id="toggleText2">
                                <p>
                                    আপনাকে প্রতি মাসে সফটওয়্যারটি ব্যবহারের জন্য 250 টাকা সার্ভিস
                                    চার্জ প্রদান করতে হবে। আমাদের মাসিক প্যাকেজ টি 30 দিনের জন্য হয় ।
                                </p>
                            </div>

                            <div id="toggleBtn3" class="accordion__item">
                                <div class="accordion__title">
                                    <div>
                                        <span class="icon"><i class="fas fa-plus"></i></span>
                                        <p class="text">
                                            আমি কি মাসিক ছাড়া আরো বেশি সময়ের জন্য কোন প্যাকেজ কিনতে পারব
                                            ?
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="toggleText" id="toggleText3">
                                <p>
                                    আপনি মাসিক প্যাকেজ টি বাদ দিয়েও আমাদের অর্ধ বার্ষিক বা বাৎসরিক
                                    প্যাকেজটি নিয়ে দেখতে পারেন আমাদের অর্ধবার্ষিক প্যাকেজটি 180 দিনের
                                    হয়, যার মূল্য 1200 টাকা এবং বাৎসরিক প্যাকেজটি 365 দিনের হয়, যার
                                    মূল্য 2000 টাকা।
                                </p>
                            </div>

                            <div id="toggleBtn4" class="accordion__item">
                                <div class="accordion__title">
                                    <div>
                                        <span class="icon"><i class="fas fa-plus"></i></span>
                                        <p class="text">আমি কি ট্রায়াল নিয়ে দেখতে পারি ?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="toggleText" id="toggleText4">
                                <p>
                                    অবশ্যই আপনি ট্রায়াল নিয়ে দেখতে পারেন। ট্রায়াল ব্যবহার করতে
                                    প্রমোশনাল কোড ব্যবহার করুন trial । এই কোডটি ব্যবহার করলে আপনি তিন
                                    দিন ট্রায়াল হিসাবে আমার ক্লায়েন্ট ব্যবহার করতে পারবেন।
                                </p>
                            </div>

                            <div id="toggleBtn5" class="accordion__item">
                                <div class="accordion__title">
                                    <div>
                                        <span class="icon"><i class="fas fa-plus"></i></span>
                                        <p class="text">
                                            আমি কি প্রিন্টার ব্যবহার করে কাস্টমারদের কে ইনভয়েস অথবা বিল
                                            দিতে পারি ?
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="toggleText" id="toggleText5">
                                <p>
                                    অবশ্যই আপনার যদি প্রিন্টার থাকে তবে খুব সহজেই আমার ক্লাইন্ট এর
                                    মাধ্যমে ইনভয়েস অথবা বিল প্রিন্ট করে কাস্টমারদের কে প্রদান করতে
                                    পারবেন।
                                </p>
                            </div>

                            <div id="toggleBtn6" class="accordion__item">
                                <div class="accordion__title">
                                    <div>
                                        <span class="icon"><i class="fas fa-plus"></i></span>
                                        <p class="text">
                                            আমি যদি সফটওয়্যারটি ব্যবহার করতে গিয়ে কোন সমস্যায় পড়ি
                                            তাহলে কিভাবে সমাধান করতে পারি ?
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="toggleText" id="toggleText6">
                                <p>
                                    আপনি যদি আমার ক্লায়েন্ট ব্যবহার করতে গিয়ে কোন সমস্যায় পড়েন তবে
                                    আমাদের সাথে ইমেইলের মাধ্যমে অথবা সরাসরি ফোন করে কাস্টমার কেয়ার
                                    এক্সিকিউটিভ এর মাধ্যমে খুব সহজে সমস্যাটির সমাধান করতে পারেন।
                                </p>
                            </div>
                        </div>


                    </div>
                </div>



            </div>
        </div>
    </section>

    <script src="{{ asset('frontend/admission/js/app.js') }}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>

</html>
