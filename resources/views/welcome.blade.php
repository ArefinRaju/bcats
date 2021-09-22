<!DOCTYPE html>
<html lang="en">

<head>
    <title>মূলপাতা | আমার স্টুডেন্ট</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.js') }}"></script>

    <script src="{{ asset('frontend/js/jssor.slider-28.1.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jssor.slider.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('frontend/css/jssor.slider.css') }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/4b5d72e539.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('frontend/css/style.min.css') }}">
    <style>
        .main-banner {
            height: 700px;
        }

        .box-area {
            margin-top: -50px;
        }

        .custom-video-youtube iframe {
            width: 100%;
            min-height: 450px;
        }

        .admission-list a {
            padding: 9px 17px !important;
            border: 2px dashed #ffee00;
            background-color: rgb(152 0 255)
        }

        #scrollTop {
            background: #c679e3;
            position: fixed;
            bottom: 20px;
            right: 0px;
            padding: 10px 15px;
            z-index: 100;
            font-size: 20px;
            border-radius: 7px 0px 0px 7px;
            color: #fff;
            cursor: pointer;
        }

        .class-room-teacher img {
            margin-top: 130px;
            /* height: 500px !important; */
        }

        @media (max-width: 999px) {
            .class-room-teacher img {
                margin-top: 60px;
            }
        }

        @media (max-width: 767px) {
            .custom-video-youtube iframe {
                margin-top: 30px;
            }

            .box-area {
                margin-top: 30px;
            }

            .main-banner {
                height: auto;
            }

            .main-banner h1 {
                font-size: 20px;
            }

            .main-banner p {
                font-size: 15px;
            }

            .get_started {
                padding: 10px 10px;
                font-size: 13px;
            }

            .custom-video-youtube iframe {
                min-height: 300px;
            }

            .box-area .single-box h3 {
                font-size: 18px;
            }

            .box-area .single-box p {
                font-size: 15px;
            }

            .service_area .section-title h2 {
                font-size: 20px;
            }

            .service_area .section-title p {
                font-size: 15px;
            }


        }

    </style>
</head>

<body>
    <i id="scrollTop" class="fas fa-arrow-up" onclick="scrollToTop()"></i>

    <noscript><strong>We're sorry but This Website doesn't work properly without JavaScript enabled. Please enable it to
            continue.</strong></noscript>
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

                            <li class="nav-item"><a class="active"
                                    href="{{ route('welcome') }}">মূলপাতা</a></li>
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
                            {{-- <li class="nav-item admission-list"><a class=" text-white"
                                    href="{{ route('admission') }}">এডমিশন</a></li> --}}
                        </ul>
                    </div>
                </div>
            </nav>

        </div>
        <div class="main-banner">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-6 col-lg-5">
                                <h1>স্টুডেন্ট ম্যানেজমেন্ট সমস্যা সমাধানে এসে গেছে <span class="main_text">"আমার
                                        স্টুডেন্ট"</span></h1>
                                <p>স্টুডেন্ট ম্যানেজ করতে গিয়ে হিমশিম খাচ্ছেন ? স্টুডেন্ট নিয়ে চিন্তা আর নয়, আপনার
                                    সকল স্টুডেন্টদের বেতন, উপস্থিতি, হোমওয়ার্ক, পরীক্ষার ফলাফল সহ সবকিছুর রেকর্ড রাখতে
                                    চলে এসেছে <span class="main_text">"আমার স্টুডেন্ট"</span> । স্টুডেন্ট এর
                                    পাশাপাশি
                                    শিক্ষকদের বেতন, ছুটি, উপস্থিতির রিপোর্টসহ আপনার কোচিং এর সমস্ত আয়-ব্যয়ের হিসাব
                                    রাখতে পারেন খুব সহজেই আমাদের এই সফটওয়্যার এর মাধ্যমে । সুতরাং আর দেরি না করে এখনই
                                    ব্যবহার করুন <span class="main_text">"আমার স্টুডেন্ট"</span> সফটওয়্যার টি।</p>
                                <a href="#" class="btn primary-btn get_started">সাইন-আপ করুন</a>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="right-banner-img custom-video-youtube">
                                    <iframe src="https://www.youtube.com/embed/QgchGY8JmZw"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end heder -->

    <div class="box-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="single-box">
                        <div class="icon">
                            <i class="fas fa-server"></i>
                        </div>
                        <h3>ছাত্র ছাত্রীদের জন্য:</h3>
                        <p> <span class="main_text">"আমার স্টুডেন্ট"</span> দিয়ে ছাত্র-ছাত্রী ম্যানেজ করা এখন খুবই
                            সহজ।
                            সঠিকভাবে নিয়ন্ত্রণ করুন প্রতিটি ক্লাসের ও প্রতিটি সেকশনের ছাত্র-ছাত্রীদের।</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="single-box">
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <h3>শিক্ষক-শিক্ষিকাদের জন্য:</h3>
                        <p>ছাত্র-ছাত্রীদের পাশাপাশি কোচিং সেন্টারের সমস্ত শিক্ষকদেরও ডিজিটাল ভাবে ম্যানেজ করুন <span
                                class="main_text">"আমার স্টুডেন্ট"</span> অ্যাপটি ব্যবহার করে।</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="single-box">
                        <div class="icon">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <h3>উপস্থিতি ও হিসাবরক্ষণ:</h3>
                        <p>শিক্ষক শিক্ষিকা এবং ছাত্র-ছাত্রীদের উপস্থিতি ম্যানেজ করার পাশাপাশি বেতন প্রদান ও আদায় কে সহজ
                            করে দেয় <span class="main_text">"আমার স্টুডেন্ট"</span> অ্যাপটি।</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="single-box">
                        <div class="icon">
                            <i class="fas fa-random"></i>
                        </div>
                        <h3>পড়াশোনা ও পরীক্ষা:</h3>
                        <p>বর্তমানে পড়াশোনাকে ডিজিটাল করতে <span class="main_text">"আমার স্টুডেন্ট"</span> নিয়ে
                            এসেছে
                            অ্যাপ ভিত্তিক বিভিন্ন বিষয়ের নোটস ও অনলাইন পরীক্ষা নেওয়ার সুযোগ।</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- box area -->

    <div class="service_area h-100 ptb-80 bg-f7fafd">
        <div class="container">

            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>কোচিং পরিচালনা সংক্রান্ত</h2>
                        <div class="bar"></div>
                        <p>তথ্যপ্রযুক্তির এই ‍যুগে আমরা আমাদের কোচিং এর কার্যক্রম ,আয় ব্যয়ের হিসাব নিকাশ ফি ও বেতন
                            সংক্রান্ত বিভিন্ন গুরুত্বপূর্ণ বিষয় ডায়েরি, নোট বুক এ লিপিবদ্ধ করে থাকি । এই হিসেব-নিকাশ
                            করতে বিভিন্ন ধরণর ভুল ভ্রান্তি হয়ে যায় । কোন কোন ক্ষেত্রে তথ্য হারিয়ে বা নষ্ট হয়ে যায় । যার
                            ফলে কোচিং পরিচালনায় অনেক বড় একটি সমস্যার সৃষ্টি হয় । <span class="main_text">"আমার
                                স্টুডেন্ট"</span> ব্যবহার করে তথ্য হারিয়ে যাওয়া, ভুলভ্রান্তি এবং হয়রানি থেকে খুব
                            সহজেই মুক্তি পাওয়া সম্ভব ।</p>
                    </div>
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="feather fas fa-database"></i>
                                ছাত্র-ছাত্রী
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="feather fas fa-globe"></i>
                                শিক্ষক-শিক্ষিকা
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="feather fas fa-file"></i>
                                ফী আদায়
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-chart-line feather"></i>
                                বেতন প্রদান
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="far fa-folder feather"></i>
                                উপস্থিতি
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-desktop feather"></i>
                                আয়-ব্যায়
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 class-room-teacher">
                    <img style="height: 100%; width: 100%;" src="{{ asset('frontend/images/classroom1.png') }}"
                        alt="">
                </div>
            </div>

        </div>

    </div>

    <!-- ++==++ -->


    <div class="service_area h-100 ptb-80">
        <div class="container">
            <div class="row h-100 justify-content-center align-items-center">

                <div class="col-lg-6">
                    <img style="height: 100%; width: 100%;" src="{{ asset('frontend/images/teachersmeeting.png') }}"
                        alt="">
                </div>

                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>নিয়মিত পড়াশুনা সংক্রান্ত</h2>
                        <div class="bar"></div>
                        <p>যেকোনো কোচিং সেন্টারের উন্নতি তার শিক্ষক ও শিক্ষার মানের উপর নির্ভর করে । পড়াশোনায় সহায়তার
                            জন্য <span class="main_text">"আমার স্টুডেন্ট"</span> শিক্ষক-শিক্ষিকাদের জন্য নিয়ে
                            এসেছে
                            বিশেষ কিছু সুবিধা । কোন শিক্ষার্থীকে নোটস-সাজেশন দেওয়া থেকে শুরু করে পরীক্ষা নেয়া ও ফলাফল
                            প্রকাশ সহ বিভিন্ন বিষয় খুব সহজেই <span class="main_text">"আমার স্টুডেন্ট"</span> দিয়ে
                            পরিচালনা করা যায় । এছাড়াও শিক্ষক-শিক্ষিকাদের জন্য রয়েছে বিভিন্ন টিচিং ম্যাটেরিয়ালস ।</p>
                    </div>
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="far fa-window-maximize feather"></i>
                                পরীক্ষা
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-code feather"></i>
                                ফলাফল
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-mobile-alt feather"></i>
                                নোটস
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-code feather"></i>
                                সাজেশন
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-mobile-alt feather"></i>
                                টিচিং মেটেরিয়াল
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-pen-nib feather"></i>
                                নোটিফিকেশন সার্ভিস
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Feature -->

    <div class="features-area ptb-80 bg-f7fafd">
        <div class="container">
            <div class="section-title">
                <h2><span class="main_text">"আমার স্টুডেন্ট"</span> এর সুবিধা সমূহ</h2>
                <div class="bar"></div>
                <p><span class="main_text">"আমার স্টুডেন্ট"</span> একটি সহজ ও শিক্ষক বান্ধব সফটওয়্যার। এছাড়াও
                    নিম্নোক্ত ফিচারগুলো <span class="main_text">"আমার স্টুডেন্ট"</span> কে ব্যবহারকারীদের জন্য
                    সর্বাপেক্ষা উপযোগী করে তোলে</p>
            </div>
            <div class="row">

                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="single-features">
                        <div class="icon">
                            <i class="fas fa-cog"></i>
                        </div>
                        <h3>সহজ ও নির্ভুল হিসাব</h3>
                        <p><span class="main_text">"আমার স্টুডেন্ট"</span> এর ব্যবহারকারী বান্ধব ডিজাইন এটিকে সবার
                            কাছে
                            সহজ এবং এর অত্যাধুনিক প্রযুক্তি সঠিক তথ্য প্রদানের মাধ্যমে হিসাবগুলো কে সম্পূর্ণ নির্ভুল করে
                            তোলে।</p>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="single-features">
                        <div class="icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <h3>অত্যাধুনিক প্রযুক্তি</h3>
                        <p><span class="main_text">"আমার স্টুডেন্টে"</span> কৃত্রিম বুদ্ধিমত্তার মত কিছু
                            অত্যাধুনিক
                            প্রযুক্তি ব্যবহার করা হয়েছে যার ফলে এটি বাজারে থাকা অন্যান্য সফটওয়্যার গুলোর তুলনায় অনেক
                            বেশি অ্যাডভান্স।</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="single-features">
                        <div class="icon">
                            <i class="fas fa-th-large"></i>
                        </div>
                        <h3>সর্বাধিক নিরাপত্তা</h3>
                        <p><span class="main_text">"আমার স্টুডেন্ট"</span> নিবন্ধন ও লগ-ইন এর ক্ষেত্রে থাকছে
                            ওটিপি।
                            যতবার লগ ইন করা হবে ততবার ওটিপি দিতে হবে। যা ব্যবহারকারীর সর্বাধিক নিরাপত্তা নিশ্চিত করে।
                        </p>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="single-features">
                        <div class="icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <h3>অসাধারণ পরিষেবা</h3>
                        <p><span class="main_text">"আমার স্টুডেন্টের"</span> 24 ঘন্টা সাপোর্ট টিমের মাধ্যমে গ্রহণ
                            করুন
                            দ্রুত ও ঝামেলামুক্ত সেবা। এছাড়াও সাধারণ সমস্যা গুলোর জন্য “সচরাচর জিজ্ঞাসা” অংশ তো আছেই।
                        </p>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6 h-100">
                    <div class="single-features">
                        <div class="icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h3>নোটিফিকেশন সার্ভিস</h3>
                        <p>বিভিন্ন সময় নানান বিষয়ে ছাত্রছাত্রী ও শিক্ষকদের রিমাইন্ডার দিতে হয়, <span
                                class="main_text">"আমার স্টুডেন্ট"</span> এর অটোমেটিক নোটিফিকেশন সিস্টেম এই কাজটি
                            সহজেই
                            করে থাকে।</p>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6 h-100">
                    <div class="single-features">
                        <div class="icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <h3>শতভাগ গোপনীয়তা</h3>
                        <p>সঠিক ও নির্ভুল হিসাব হচ্ছে যেকোনো ব্যবস্থাপনার মেরুদন্ড। <span class="main_text">"আমার
                                স্টুডেন্ট"</span> কোচিং সেন্টারের শতভাগ গোপনীয়তা এবং স্বচ্ছতা বজায় রাখতে দৃঢ় প্রতিজ্ঞ।
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- Team Member -->




    <!-- Pricing -->

    <div class="pricing-area ptb-80 bg-f9f6f6">
        <div class="container">
            <div class="section-title">
                <h2>মূল্য তালিকা</h2>
                <div class="bar"></div>
                <p>"আমার স্টুডেন্ট" একটি সহজ ও শিক্ষক বান্ধব সফটওয়্যার। এছাড়াও নিম্নোক্ত ফিচারগুলো "আমার স্টুডেন্ট" কে
                    ব্যবহারকারীদের জন্য সর্বাপেক্ষা উপযোগী করে তোলে..</p>
            </div>

            <div class="row">

                <div class="col-md-4 col-sm-6">
                    <div class="pricing-table">
                        <div class="pricing-header">
                            <h3>মাসিক</h3>
                        </div>
                        <div class="price">
                            <span><sup>৳</sup>২৫০<span>৫০ জন ছাত্রছাত্রীর জন্য</span></span>
                        </div>
                        <div class="pricing-features">
                            <ul>
                                <li class="active">স্টুডেন্ট ব্যবস্থাপনাা</li>
                                <li class="active">শিক্ষক ব্যবস্থাপনা</li>
                                <li class="active">আয়-ব্যয়ের হিসাব</li>
                                <li class="active">পরীক্ষা ও ফলাফল</li>
                                <li class="active">নোটস আর সাজেশন</li>
                                <li class="active"> টিচিং মেটেরিয়াল</li>
                                <li class="active">এস এম এস সার্ভিস</li>
                                <li class="active">নোটিফিকেশন সার্ভিস</li>
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            <a href="#" class="btn primary-btn login-btn text-uppercase">নির্বাচন করুন</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="pricing-table active-plane">
                        <div class="pricing-header">
                            <h3>অর্ধ বাৎসরিক</h3>
                        </div>
                        <div class="price">
                            <span><sup>৳</sup> ১২০০<span>১০০ জন ছাত্রছাত্রীর জন্য</span></span>
                        </div>
                        <div class="pricing-features">
                            <ul>
                                <li class="active">স্টুডেন্ট ব্যবস্থাপনাা</li>
                                <li class="active">শিক্ষক ব্যবস্থাপনা</li>
                                <li class="active">আয়-ব্যয়ের হিসাব</li>
                                <li class="active">পরীক্ষা ও ফলাফল</li>
                                <li class="active">নোটস আর সাজেশন</li>
                                <li class="active"> টিচিং মেটেরিয়াল</li>
                                <li class="active">এস এম এস সার্ভিস</li>
                                <li class="active">নোটিফিকেশন সার্ভিস</li>
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            <a href="#" class="btn primary-btn login-btn text-uppercase">নির্বাচন করুন</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="pricing-table">
                        <div class="pricing-header">
                            <h3>বাৎসরিক</h3>
                        </div>
                        <div class="price">
                            <span><sup>৳</sup>২০০০<span>২৫০ জন ছাত্রছাত্রীর জন্য</span></span>
                        </div>
                        <div class="pricing-features">
                            <ul>
                                <li class="active">স্টুডেন্ট ব্যবস্থাপনাা</li>
                                <li class="active">শিক্ষক ব্যবস্থাপনা</li>
                                <li class="active">আয়-ব্যয়ের হিসাব</li>
                                <li class="active">পরীক্ষা ও ফলাফল</li>
                                <li class="active">নোটস আর সাজেশন</li>
                                <li class="active"> টিচিং মেটেরিয়াল</li>
                                <li class="active">এস এম এস সার্ভিস</li>
                                <li class="active">নোটিফিকেশন সার্ভিস</li>
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            <a href="#" class="btn primary-btn login-btn text-uppercase">নির্বাচন করুন</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- feedback area -->

    <div class="feedback-area ptb-80 bg-f7fafd">
        <div class="container">
            <div class="section-title">
                <h2>“আমার স্টুডেন্ট” অ্যাপ রিভিউ-</h2>
                <div class="bar"></div>
                <p>"আমার স্টুডেন্ট" একটি সহজ ও শিক্ষক বান্ধব সফটওয়্যার। এছাড়াও আমার স্টডেন্টের রিভিউ গুলোকে এখানে
                    দেখানো হয়েছে..</p>
            </div>
        </div>
        <div class="feedback-slider">
            <div id="jssor_1"
                style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:400px;overflow:hidden;visibility:hidden; padding-bottom: 20px;">
                <!-- Loading Screen -->
                <div data-u="loading" class="jssorl-009-spin"
                    style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;"
                        src="{{ asset('frontend/img/spin.svg') }}" />
                </div>
                <div data-u="slides"
                    style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
                    <div>
                        <div class="single-feedback">
                            <div class="client-img">
                                <img src="{{ asset('frontend/images/1.5c4c3867.jpg') }}" alt="">
                            </div>
                            <h3>জন লুসি</h3>
                            <span>ওয়েব ডেভলপার</span>
                            <p>একটি কোচিং সেন্টারের শিক্ষক শিক্ষিকার বেতন প্রদান, উপস্থিতি এবং প্রয়োজনীয় নোটিশ প্রদান
                                একটি গুরুত্বপূর্ণ এবং জটিল প্রক্রিয়া যা এই অ্যাপটির মাধ্যমে খুব সহজেই করা যাবে। তাই এই
                                অ্যাপটি আমার ভালো লেগেছে।</p>
                        </div>
                        <img src="{{ asset('frontend/images/1.5c4c3867.jpg') }}" data-u="thumb" alt="">
                    </div>
                    <div>
                        <div class="single-feedback">
                            <div class="client-img">
                                <img src="{{ asset('frontend/images/2.cd2c0c1a.jpg') }}" data-u="thumb" alt="">
                            </div>
                            <h3>জন হেনরিক</h3>
                            <span>ওয়েব ডেভলপার</span>
                            <p>এই অ্যাপটির যে বিষয়টি সবচেয়ে ভালো লেগেছে তা হল-
                                বাচ্চাদের কোচিং সেন্টারে পাঠিয়ে আমরা খুব চিন্তিত থাকি, বাচ্চারা ঠিকমতো ক্লাসে উপস্থিত
                                হচ্ছে কিনা। “আমার স্টুডেন্ট” অ্যাপটির সাহায্যে তা ঘরে বসেই জানতে পারব।</p>
                        </div>
                        <img src="{{ asset('frontend/images/2.cd2c0c1a.jpg') }}" data-u="thumb" alt="">
                    </div>
                    <div>
                        <div class="single-feedback">
                            <div class="client-img">
                                <img src="{{ asset('frontend/images/3.c8868f36.jpg') }}" alt="">
                            </div>
                            <h3>জন নেহারিকা</h3>
                            <span>ওয়েব ডেভলপার</span>
                            <p>“আমার স্টুডেন্ট” অ্যাপটিতে শিক্ষার্থীদের সকল পরীক্ষার ফলাফলসহ তাদের অগ্রগতি ও অবনতির সব
                                রিপোর্ট নির্ভুলভাবে সংরক্ষণ করা যাবে যা কোচিং সেন্টারের শিক্ষার মান উন্নয়নে খুব সহায়ক
                                হবে। এটি সত্যিই খুব ভালো। </p>
                        </div>
                        <img src="{{ asset('frontend/images/3.c8868f36.jpg') }}" data-u="thumb" alt="">
                    </div>
                    <div>
                        <div class="single-feedback">
                            <div class="client-img">
                                <img src="{{ asset('frontend/images/4.9a179115.jpg') }}" alt="">
                            </div>
                            <h3>জন ট্রাগল</h3>
                            <span>ওয়েব ডেভলপার</span>
                            <p>এটি একটি কোচিং ম্যানেজমেন্ট অ্যাপ যার সাহায্যে একটি কোচিং সেন্টারের সম্পূর্ণ ম্যানেজমেন্ট
                                সিস্টেম কে নিয়ন্ত্রণ করা খুব সহজ হবে। এজন্য অ্যাপটিকে বেশ. যুগোপযোগী মনে হচ্ছে।</p>
                        </div>
                        <img src="{{ asset('frontend/images/4.9a179115.jpg') }}" data-u="thumb" alt="">
                    </div>
                    <div>
                        <div class="single-feedback">
                            <div class="client-img">
                                <img src="{{ asset('frontend/images/3.c8868f36.jpg') }}" alt="">
                            </div>
                            <h3>জন পিউএই</h3>
                            <span>ওয়েব ডেভলপার</span>
                            <p>একটি কোচিং সেন্টারের শিক্ষক শিক্ষিকার বেতন প্রদান, উপস্থিতি এবং প্রয়োজনীয় নোটিশ প্রদান
                                একটি গুরুত্বপূর্ণ এবং জটিল প্রক্রিয়া যা এই অ্যাপটির মাধ্যমে খুব সহজেই করা যাবে। তাই এই
                                অ্যাপটি আমার ভালো লেগেছে।</p>
                        </div>
                        <img src="{{ asset('frontend/images/3.c8868f36.jpg') }}" data-u="thumb" alt="">
                    </div>
                </div><a data-scale="0" href="https://www.jssor.com" style="display:none;position:absolute;">web
                    animation</a>
                <!-- Thumbnail Navigator -->
                <div data-u="thumbnavigator" class="jssort101"
                    style="position:absolute;left:0px;bottom:0px;width:980px;height:100px;background-color:#000;"
                    data-autocenter="1" data-scale-bottom="0.75">
                    <div data-u="slides">
                        <div data-u="prototype" class="p" style="width:190px;height:90px;">
                            <div data-u="thumbnailtemplate" class="t"></div>
                        </div>
                    </div>
                </div>
                <!-- Arrow Navigator -->
                <div data-u="arrowleft" class="jssora106" style="width:55px;height:55px;top:162px;left:30px;"
                    data-scale="0.75">
                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                        <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                        <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
                    </svg>
                </div>
                <div data-u="arrowright" class="jssora106" style="width:55px;height:55px;top:162px;right:30px;"
                    data-scale="0.75">
                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                        <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 ">
                        </polyline>
                        <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
                    </svg>
                </div>
            </div>
        </div>
    </div>


    <!-- blog area -->
    <div class="blog-area ptb-80">
        <div class="container">
            <div class="section-title">
                <h2>আমাদের নতুন ব্লগ</h2>
                <div class="bar"></div>
                <p>"আমার স্টুডেন্ট" একটি সহজ ও শিক্ষক বান্ধব সফটওয়্যার। এছাড়াও আমার স্টডেন্টের নতুন নতুন ব্লগ গোলোকে
                    এখানে দেখানো হইয়ে থাকে..</p>
            </div>
            <div class="row p-4">

                <div class="col-md-4 col-sm-6">
                    <div class="single-blog-post rounded">
                        <div class="blog-img">
                            <a href="{{ route('blog.details') }}">
                                <img src="{{ asset('frontend/images/teacher3.png') }}" alt="blog img"
                                    style="height: 250px; width: 100%;">
                            </a>
                            <div class="date">
                                <i class="far fa-calendar-alt"></i> March 15, 2019
                            </div>
                        </div>
                        <div class="blog-post-content">
                            <h3><a href="{{ route('blog.details') }}">একজন ভালো শিক্ষকের গুণাবলী ...</a></h3>
                            <span>by <a href="#">admin</a></span>
                            <p>জন অ্যাডামস শিক্ষককে “Maker of Man” বলে অভিহিত করেছেন। তিনি আরো বলেছেন ” শিক্ষক হলেন
                                জাতির আলোকবর্তিকাবাহি ...</p>
                            <a class="read-more-btn" href="{{ route('blog.details') }}">Read More <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="single-blog-post rounded">
                        <div class="blog-img">
                            <a href="{{ route('blog.details1') }}">
                                <img src="{{ asset('frontend/images/coaching.png') }}" alt="blog img"
                                    style="height: 250px; width: 100%;">
                            </a>
                            <div class="date">
                                <i class="far fa-calendar-alt"></i> March 15, 2019
                            </div>
                        </div>
                        <div class="blog-post-content">
                            <h3><a href="{{ route('blog.details1') }}">কোচিং ম্যানেজমেন্ট এর গুরুত্ব...</a></h3>
                            <span>by <a href="#">admin</a></span>
                            <p>যদি একজন সফল কোচিং সেন্টারের উদ্যোক্তা হতে চান তাহলে সবচেয়ে গুরুত্বপূর্ণ যে বিষয়টি
                                সম্পর্কে আপনাকে জানতে হবে তা হল...</p>
                            <a class="read-more-btn" href="{{ route('blog.details1') }}">Read More <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="single-blog-post rounded">
                        <div class="blog-img">
                            <a href="{{ route('blog.details2') }}">
                                <img src="{{ asset('frontend/images/coaching-software.png') }}" alt="blog img"
                                    style="height: 250px; width: 100%;">
                            </a>
                            <div class="date">
                                <i class="far fa-calendar-alt"></i> March 15, 2019
                            </div>
                        </div>
                        <div class="blog-post-content">
                            <h3><a href="{{ route('blog.details2') }}">সফটওয়্যার কিভাবে সাহয্য করতে পারে...?</a>
                            </h3>
                            <span>by <a href="#">admin</a></span>
                            <p>বর্তমান যুগ প্রযুক্তির যুগ । মানুষের বেডরুম থেকে শুরু করে....
                            </p>
                            <a class="read-more-btn" href="{{ route('blog.details2') }}">Read More <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <footer class="footer-area bg-f7fafd">
        <div class="container">
            <img src="images/map.caeeab2f.png" alt="" class="map">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="logo">
                            <a href="#">
                                <img src="{{ asset('frontend/images/logo.png') }}" alt="">
                            </a>
                        </div>
                        <p><span class="main_text">"আমার স্টুডেন্ট"</span>-ই দিচ্ছে কোচিং সেন্টার ম্যানেজ করার
                            সহজ,
                            সাশ্রয়ী এবং ডিজিটাল সলিউশন যা মোবাইল এবং কম্পিউটার দুটোতেই ব্যবহার করা সম্ভব।</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget pl-5">
                        <h3>Company</h3>
                        <ul class="list">
                            <li><a href="{{ route('welcome') }}">মূলপাতা </a></li>
                            <li><a href="{{ route('about') }}">বিস্তারিত </a></li>
                            <li><a href="{{ route('blog') }}">ব্লগ </a></li>
                            <li><a href="{{ route('contact') }}">যোগাযোগ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h3>Support</h3>
                        <ul class="list">
                            <li><a href="{{ route('faq') }}">FAQ's</a></li>
                            <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                            <li><a href="#">Terms &amp; Condition</a></li>
                            <li><a href="#">Career</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h3>Address</h3>
                        <ul class="footer-contact-info">
                            <li><i class="fas fa-map-marker-alt"></i> House# 411, Flat# 3B, Road# 29, New DOHS
                                Mohakhali, Dhaka</li>
                            <li><i class="far fa-envelope"></i> Email: support@amarstudent.com</li>
                            <li><i class="fas fa-phone"></i> Phone: +8809696863000</li>
                            <li><i class="fas fa-phone"></i> Phone: +8801774444000</li>
                        </ul>
                        <ul class="social-links">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="copyright-area">
                        <p>কপিরাইট © ২০২১ <span class="main_text">"আমার স্টুডেন্ট - আমার ডিজিটাল কোচিং"</span>
                            সর্বস্বত্ব সংরক্ষিত </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script type="text/javascript">
        jssor_1_slider_init();
    </script>
    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            margin: 10,
            loop: true,
            autoplay: true,
            touchDrag: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
    <script src="{{ asset('frontend/js/app.js') }}"></script>
</body>

</html>
