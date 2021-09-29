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

            .right-banner-img {
                width: 80%;
                margin: auto;
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
                        <a href="/"><img src="{{ asset('frontend/images/custom/logo.png') }}" alt="Logo"
                                class="logo" style="width:110px;height:45px;"></a>
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
                            <div class="col-md-6 col-lg-6">
                                <h1>ভবন নির্মাণের সমস্যা সমাধানে এসে গেছে <span class="main_text">"BCATS"</span></h1>
                                <p>ভবন নির্মাণ করতে গিয়ে চিন্তায় পড়েছেন ? কিভাবে শুরু থেকে শেষ পর্যন্ত এই বিশাল কর্মকাণ্ডের ব্যবস্থাপনা পরিচালনা করবেন ? আপনার চিন্তার অবসান করতে এসে গেছে 
                                    <span class="main_text">"BCATS"</span> । <span class="main_text">"BCATS"</span>  এর মাধ্যমে আপনি প্রতিদিনের হিসাব-নিকাশ সংরক্ষণ করতে পারেন এক নিমিষেই। কন্ট্রাক্টর এবং সাপ্লাইয়ারের পেমেন্ট দেয়া, মালামালের ব্যবহার ও মজুদের পরিমাণ সংরক্ষণ করা , সমিতির সদস্যদের কিস্তির হিসাব রাখা সহ কনস্ট্রাকশন সাইট এর যাবতীয় হিসাব নিকাশ রাখতে পারেন খুব সহজেই। আপনার ভবন নির্মাণ কাজের ডিজিটাল সমাধানের জন্য আজই ব্যবহার করুন
                                     <span class="main_text">"BCATS"</span> ।</p>
                                <a href="#" class="btn primary-btn get_started">সাইন-আপ করুন</a>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="right-banner-img" style="width: 80%; margin: auto;">
                                    <iframe width="560" height="300" src="https://www.youtube.com/embed/QgchGY8JmZw"
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
                        <h3>Zero Configuration :</h3>
                        <p> একক ব্যক্তি হিসেবে ভবন নির্মাণের ক্ষেত্রে <span
                            class="main_text">"BCATS"</span> আপনাকে দিচ্ছে শুরু থেকে শেষ পর্যন্ত ডিজিটাল পদ্ধতিতে হিসাব সংরক্ষণ ব্যবস্থা ।</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="single-box">
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <h3>
                            Code Security :</h3>
                        <p>একাধিক ভবন নির্মাণের ক্ষেত্রে  <span
                            class="main_text">"BCATS"</span> এর মাধ্যমে প্রতিটি ভবনের হিসাব আলাদা ভাবে সংরক্ষণের পাশাপাশি সবগুলো প্রজেক্ট এর হিসাব একসাথে দেখার সুবিধা ।</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="single-box">
                        <div class="icon">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <h3>Team Management :</h3>
                        <p> <span class="main_text">"BCATS"</span> সমিতি প্রজেক্ট নির্মাণের হিসাব-নিকাশ প্রতিটি সদস্যদের কাছে মুহূর্তেই প্রদর্শন করে যা কিনা আগামী ভবন নির্মাণের ক্ষেত্রে অতীব জরুরী
                             ।</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="single-box">
                        <div class="icon">
                            <i class="fas fa-random"></i>
                        </div>
                        <h3>
                            Access Controlled :</h3>
                        <p>সহকারী পদের ক্ষেত্রে প্রজেক্ট পরিচালক <span class="main_text">"BCATS"</span> এর মাধ্যমে কাজের অগ্রগতি পর্যালোচনা করে উক্ত কাছ থেকে সঠিক সময়ের মধ্যে শেষ করার জন্য প্রয়োজনীয় পদক্ষেপ নিতে পারেন ।</p>
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
                        <h2>Cloud Hosting Services </h2>
                        <div class="bar"></div>
                        <p><span
                            class="main_text">"BCATS"</span> এর সুবিধা বর্তমান ডিজিটালাইজেশনের সময় আপনার ভবনের হিসাব-নিকাশ ডিজিটাল সংরক্ষণ করে বিধায় এটা যেমন হারিয়ে যাবে না তেমন নষ্ট হয়ে যাবে না বিকাশের মাধ্যমে যে সুবিধা গুলি পাব ।</p>
                    </div>
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="feather fas fa-database"></i>
                                হিসাব
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="feather fas fa-globe"></i>
                                কিস্তি
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="feather fas fa-file"></i>
                                পেমেন্ট
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-chart-line feather"></i>
                                কাজের অগ্রগতি
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="far fa-folder feather"></i>
                                মালামালের ব্যবহার
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-desktop feather"></i>
                                মজুদ
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="far fa-envelope feather" aria-hidden="true"></i>
                                আদান-প্রদান
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-cloud feather" aria-hidden="true"></i>
                                ইনভয়েস
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6 services-right-image">
                    <img src="https://bcats.net/frontend/assets/images/book-self.b10dddef.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/box.7286ddc2.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/chair.a19ee750.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/cloud.e946c7fc.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/pendrive.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/lamp.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/small_headphone.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/monitor.d8486dc1.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/small_cup.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/table.c5ad93dd.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/data_cup.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/buttol.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/wifi.9a90df82.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/cercle-shape.400c224e.png" class="bg-image rotateme" alt="">
                    <img src="https://bcats.net/frontend/assets/images/main-pic.ce74ab60_small.png" alt="">
                </div>

            </div>

        </div>

    </div>

    <!-- ++==++ -->


    <div class="service_area h-100 ptb-80">
        <div class="container">

            <div class="row h-100 justify-content-center align-items-center">

                <div class="col-lg-6 services-left-image">
                    <img src="https://bcats.net/frontend/assets/images/big-monitor.7e2fbc06.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/onLight.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/developer.0bb5ee47.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/flower-top.b1e14354.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/small-monitor.a8310421.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/la-Cup.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/p_img.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/target.b507c79f.png" alt="">
                    <img src="https://bcats.net/frontend/assets/images/cercle-shape.400c224e.png" class="bg-image rotateme" alt="">
                    <img src="https://bcats.net/frontend/assets/images/main-pic.c8654c15_3.png" alt="">
                </div>

                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>Design &amp; Development</h2>
                        <div class="bar"></div>
                        <p><span
                            class="main_text">"BCATS"</span> এর সুবিধা বর্তমান ডিজিটালাইজেশনের সময় আপনার ভবনের হিসাব-নিকাশ ডিজিটাল সংরক্ষণ করে  বিধায় এটা যেমন হারিয়ে যাবে না তেমন নষ্ট হয়ে যাবে না "BCATS" এর মাধ্যমে যে সুবিধা গুলি পাব</p>
                    </div>
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="far fa-window-maximize feather" aria-hidden="true"></i>
                                এস এম এস
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-code feather" aria-hidden="true"></i>
                                ওয়ার্কশীট
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-mobile-alt feather" aria-hidden="true"></i>
                                বেতন
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-code feather" aria-hidden="true"></i>
                                পে স্লিপ
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-mobile-alt feather" aria-hidden="true"></i>
                                রিপোর্ট
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-pen-nib feather" aria-hidden="true"></i>
                                ডিমান্ড
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-shopping-cart feather" aria-hidden="true"></i>
                                নোটিফিকেশন
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="far fa-check-circle feather" aria-hidden="true"></i>
                                ব্যাকআপ
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
                <h2><span class="main_text">"BCATS"</span> এর হিসাব সংরক্ষণ :</h2>
                <div class="bar"></div>
                <p><span class="main_text">"BCATS"</span> একটি সহজ বান্ধব সফটওয়্যার। এছাড়াও
                    নিম্নোক্ত ফিচারগুলো <span class="main_text">"BCATS"</span> কে ব্যবহারকারীদের জন্য
                    সর্বাপেক্ষা উপযোগী করে তোলে</p>
            </div>

            <div class="row">

                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="single-features">
                        <div class="icon">
                            <i class="fas fa-bell" aria-hidden="true"></i>
                        </div>
                        <h3>হিসাব সংরক্ষণ:</h3>
                        <p>"BCATS" এর মাধ্যমে নির্মাণ কাজের হিসাব সংরক্ষণ করুন সম্পূর্ণ ডিজিটাল পদ্ধতিতে এবং প্রয়োজন মতো যে কোন মুহূর্তে যে কোন স্থানে বসে পর্যবেক্ষণ করুন | ভবন নির্মাণ সংক্রান্ত হিসাব নিকাশের সঠিক তথ্য তাৎক্ষণিকভাবে পেতে ও প্রদান করতে "BCATS" আপনাকে সহায়তা করবে</p>
                    </div>
                </div>
  
                  <div class="col-sm-6 col-md-6 col-lg-6">
                      <div class="single-features">
                          <div class="icon">
                              <i class="fas fa-cog" aria-hidden="true"></i>
                          </div>
                          <h3>মালামাল মজুদ ও সংরক্ষণ:</h3>
                          <p>সাইটে মালামালের দৈনন্দিন ব্যবহারের হিসাব রাখা, মালামালের স্টক সংরক্ষণ করা , কোন পণ্যের মজুদ কম আছে এবং আগামীতে কোন পণ্যটি প্রয়োজন তার নোটিফিকেশন প্রধানের মত কাজগুলো "BCATS" এর খুব সহজেই করে থাকে ,যা আপনার কাজের গতি ত্বরান্বিত করবে</p>
                      </div>
                  </div>
  
                  <div class="col-sm-6 col-md-6 col-lg-6">
                      <div class="single-features">
                          <div class="icon">
                              <i class="far fa-envelope" aria-hidden="true"></i>
                          </div>
                          <h3>সমিতির সদস্যদের হিসাব:</h3>
                          <p>"BCATS" এর মাধ্যমে সমিতির সদস্যদের মাসিক কিস্তির সঠিক হিসাব রাখা যায় ডিজিটাল ভাবে। কমিটির কোন সদস্য মাসিক কিস্তি বকেয়া থাকলে অন্যান্য সদস্যরা "BCATS" সফটওয়্যার এর মাধ্যমে তা জানতে পারবে এবং তাকে কিস্তি প্রদানের জন্য তাগাদা দিতে পারবে</p>
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                      <div class="single-features">
                          <div class="icon">
                              <i class="fas fa-th-large" aria-hidden="true"></i>
                          </div>
                          <h3>কাজের অগ্রগতি পর্যবেক্ষণ:</h3>
                          <p>"BCATS" ব্যবহার করে সাইট ইঞ্জিনিয়ার দৈনিক কাজের রিপোর্ট সাবমিট করবে ফলে ভবনের মালিক অথবা সমিতির সদস্যরা যেখানেই থাকুন না কেন তারা তাদের ভবনের কাজের বর্তমান অগ্রগতির রিপোর্ট এবং প্রয়োজনীয় পণ্যের লিস্ট সাথে সাথেই দেখতে পারবে</p>
                      </div>
                  </div>
  
                  <div class="col-sm-6 col-md-6 col-lg-6">
                      <div class="single-features">
                          <div class="icon">
                              <i class="fas fa-info-circle" aria-hidden="true"></i>
                          </div>
                          <h3>সার্ভার ব্যাকআপ :</h3>
                          <p>নির্মাণাধীন প্রজেক্ট এর সমস্ত হিসাব নিকাশ “BCATS” ডিজিটাল ভাবে সংরক্ষন করে। খাতা-কলমে হিসাব করা যেমন সময় সাপেক্ষ ব্যাপার তেমনি  হিসাবের খাতা টি যেকোনো মুহূর্তে নষ্ট হয়ে বা হারিয়ে যেতে পারে কিন্তু "BCATS"এর মাধ্যমে ডাটা টি সার্ভারে থাকে যা  হারানো অসম্ভব</p>
                      </div>
                  </div>
  
                  <div class="col-sm-6 col-md-6 col-lg-6">
                      <div class="single-features">
                          <div class="icon">
                              <i class="fas fa-mouse-pointer" aria-hidden="true"></i>
                          </div>
                          <h3>গুরুত্বপূর্ণ সিদ্ধান্ত গ্রহণ:</h3>
                          <p> প্রজেক্ট এর দায়িত্বশীল ব্যক্তি "BCATS"এর অ্যাপের মাধ্যমে কাজের বর্তমান অগ্রগতি পর্যালোচনা মাধ্যমে সঠিক সিদ্ধান্ত নেওয়া বা কোন পরিকল্পনার পর্যবেক্ষণ করার মাধ্যমে কাজটি সঠিক সময়ে সম্পূর্ণ করার সিদ্ধান্ত নিতে পারে। </p>
                      </div>
                  </div>
              </div>

        </div>
    </div>
    <!-- Team Member -->

    <!-- blog area -->
    <div class="blog-area">
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
                                <img src="{{ asset('frontend/images//custom/logo.png') }}" alt="" style="width: 110px;height:45px;">
                            </a>
                        </div>
                        <p><span class="main_text">"BCATS"</span> ই দিচ্ছে ভবন নির্মাণ ম্যানেজ করার সহজ,
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
