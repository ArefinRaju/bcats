<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->

        <title>BCATS | Home</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('home') }}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('home') }}/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ asset('home') }}/css/owl.theme.default.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

        <script src="{{ asset('home') }}/js/jquery.min.js"></script>
        <script src="{{ asset('home') }}/js/owl.carousel.js"></script>

        <script src="{{ asset('home') }}/js/jssor.slider-28.1.0.min.js"></script>
        <script src="{{ asset('home') }}/js/jssor.slider.js"></script>
        <link rel="stylesheet" href="{{ asset('home') }}/css/jssor.slider.css">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/4b5d72e539.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('home') }}/css/style.min.css">

    </head>
    <body class="antialiased">
<noscript><strong>We're sorry but This Website doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript>
    <header>
        <div class="bg-light fixed-top py-1">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container position-relative">
                    <div class="logo_img navbar-brand">
                        <a href="/"><img src="{{ asset('home') }}/images/logo.png" alt="Logo" class="logo"></a>
                    </div>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav menu">

                      <li class="nav-item"><a class="d-block primary-btn text-dark support-btn" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="d-block primary-btn text-dark support-btn" href="contact.html">Contact</a></li>
                        <div class="top-btn">
                            {{-- <button id="login_btn" class="primary-btn login-btn">Login</button> --}}
                            <a href="{{ url('login') }}" class="btn primary-btn login-btn text-uppercase">Login</a>

                        </div>
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
                                <h1>ভবন নির্মাণের সমস্যা সমাধানে এসে গেছে "BCATS"</h1>
                                <p>ভবন নির্মাণ করতে গিয়ে চিন্তায় পড়েছেন ? কিভাবে শুরু থেকে শেষ পর্যন্ত এই বিশাল কর্মকাণ্ডের ব্যবস্থাপনা পরিচালনা করবেন ? আপনার চিন্তার অবসান করতে এসে গেছে "BCATS". "BCATS" এর মাধ্যমে আপনি প্রতিদিনের হিসাব-নিকাশ সংরক্ষণ করতে পারেন এক নিমিষেই। কন্ট্রাক্টর এবং সাপ্লাইয়ারের পেমেন্ট দেয়া, মালামালের ব্যবহার ও মজুদের পরিমাণ সংরক্ষণ করা , সমিতির সদস্যদের কিস্তির হিসাব রাখা সহ কনস্ট্রাকশন সাইট এর যাবতীয় হিসাব নিকাশ রাখতে পারেন খুব সহজেই। আপনার ভবন নির্মাণ কাজের ডিজিটাল সমাধানের জন্য আজই ব্যবহার করুন "BCATS"।</p>
                                <a href="#" class="btn primary-btn get_started">Get Started</a>
                            </div>
                            <div class="col-lg-6 offset-lg-1 col-md-6">
                                <div class="right-banner-img">
                                    <img class="code-img" src="{{ asset('home') }}/images/man.fc7952de.png" alt="">
                                    <img src="{{ asset('home') }}/images/code.c6b6891c.png" alt="">
                                    <img src="{{ asset('home') }}/images/carpet.7f5c3fbc.png" alt="">
                                    <img src="{{ asset('home') }}/images/bin.94c293e7.png" alt="">
                                    <img src="{{ asset('home') }}/images/book.f4aa1cb6.png" alt="">
                                    <img src="{{ asset('home') }}/images/dekstop.f4a73c99.png" alt="">
                                    <img src="{{ asset('home') }}/images/buble.png" alt="">
                                    <img src="{{ asset('home') }}/images/flower-top-big.91455c17.png" alt="">
                                    <img src="{{ asset('home') }}/images/flower-top.488bb066.png" alt="">
                                    <img src="{{ asset('home') }}/images/keyboard.23b516e8.png" alt="">
                                    <img src="{{ asset('home') }}/images/penbox.png" alt="">
                                    <img src="{{ asset('home') }}/images/table.63027416.png" alt="">
                                    <img src="{{ asset('home') }}/images/cup.png" alt="">
                                    <img src="{{ asset('home') }}/images/headphone.png" alt="">
                                    <img src="{{ asset('home') }}/images/main-pic.84672f75.png" alt="">
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
                        <h3>Zero Configuration</h3>
                        <p>একক ব্যক্তি হিসেবে ভবন নির্মাণের ক্ষেত্রে "BCATS" আপনাকে দিচ্ছে শুরু থেকে শেষ পর্যন্ত ডিজিটাল পদ্ধতিতে হিসাব সংরক্ষণ ব্যবস্থা</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="single-box">
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <h3>Code Security</h3>
                        <p>একাধিক ভবন নির্মাণের ক্ষেত্রে "BCATS" এর মাধ্যমে প্রতিটি ভবনের হিসাব আলাদা ভাবে সংরক্ষণের পাশাপাশি সবগুলো প্রজেক্ট এর হিসাব একসাথে দেখার সুবিধা</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="single-box">
                        <div class="icon">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <h3>Team Management</h3>
                        <p>"BCATS" সমিতি প্রজেক্ট নির্মাণের হিসাব-নিকাশ প্রতিটি সদস্যদের কাছে মুহূর্তেই প্রদর্শন করে যা কিনা আগামী ভবন নির্মাণের ক্ষেত্রে অতীব জরুরী</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="single-box">
                        <div class="icon">
                            <i class="fas fa-random"></i>
                        </div>
                        <h3>Access Controlled</h3>
                        <p> সহকারী পদের ক্ষেত্রে প্রজেক্ট পরিচালক "BCATS"এর মাধ্যমে কাজের অগ্রগতি পর্যালোচনা করে উক্ত কাছ থেকে সঠিক সময়ের মধ্যে শেষ করার জন্য প্রয়োজনীয় পদক্ষেপ নিতে পারেন</p>
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
                        <h2>Cloud Hosting Services</h2>
                        <div class="bar"></div>
                        <p>"BCATS" এর সুবিধা বর্তমান ডিজিটালাইজেশনের সময় আপনার ভবনের হিসাব-নিকাশ ডিজিটাল সংরক্ষণ করে  বিধায় এটা যেমন হারিয়ে যাবে না তেমন নষ্ট হয়ে যাবে না বিকাশের মাধ্যমে যে সুবিধা গুলি পাব</p>
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
                                <i class="far fa-envelope feather"></i>
                                আদান-প্রদান
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-cloud feather"></i>
                                ইনভয়েস
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 services-right-image">
                    <img src="{{ asset('home') }}/images/book-self.b10dddef.png" alt="">
                    <img src="{{ asset('home') }}/images/box.7286ddc2.png" alt="">
                    <img src="{{ asset('home') }}/images/chair.a19ee750.png" alt="">
                    <img src="{{ asset('home') }}/images/cloud.e946c7fc.png" alt="">
                    <img src="{{ asset('home') }}/images/pendrive.png" alt="">
                    <img src="{{ asset('home') }}/images/lamp.png" alt="">
                    <img src="{{ asset('home') }}/images/small_headphone.png" alt="">
                    <img src="{{ asset('home') }}/images/monitor.d8486dc1.png" alt="">
                    <img src="{{ asset('home') }}/images/small_cup.png" alt="">
                    <img src="{{ asset('home') }}/images/table.c5ad93dd.png" alt="">
                    <img src="{{ asset('home') }}/images/data_cup.png" alt="">
                    <img src="{{ asset('home') }}/images/buttol.png" alt="">
                    <img src="{{ asset('home') }}/images/wifi.9a90df82.png" alt="">
                    <img src="{{ asset('home') }}/images/cercle-shape.400c224e.png" class="bg-image rotateme" alt="">
                    <img src="{{ asset('home') }}/images/main-pic.ce74ab60_small.png" alt="">
                </div>
            </div>
        </div>

    </div>

    <!-- ++==++ -->


    <div class="service_area h-100 ptb-80">
        <div class="container">
            <div class="row h-100 justify-content-center align-items-center">

                <div class="col-lg-6 services-left-image">
                    <img src="{{ asset('home') }}/images/big-monitor.7e2fbc06.png" alt="">
                    <img src="{{ asset('home') }}/images/onLight.png" alt="">
                    <img src="{{ asset('home') }}/images/developer.0bb5ee47.png" alt="">
                    <img src="{{ asset('home') }}/images/flower-top.b1e14354.png" alt="">
                    <img src="{{ asset('home') }}/images/small-monitor.a8310421.png" alt="">
                    <img src="{{ asset('home') }}/images/la-Cup.png" alt="">
                    <img src="{{ asset('home') }}/images/p_img.png" alt="">
                    <img src="{{ asset('home') }}/images/target.b507c79f.png" alt="">
                    <img src="{{ asset('home') }}/images/cercle-shape.400c224e.png" class="bg-image rotateme" alt="">
                    <img src="{{ asset('home') }}/images/main-pic.c8654c15_3.png" alt="">
                </div>

                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>Design & Development</h2>
                        <div class="bar"></div>
                        <p>"BCATS" এর সুবিধা বর্তমান ডিজিটালাইজেশনের সময় আপনার ভবনের হিসাব-নিকাশ ডিজিটাল সংরক্ষণ করে  বিধায় এটা যেমন হারিয়ে যাবে না তেমন নষ্ট হয়ে যাবে না "BCATS" এর মাধ্যমে যে সুবিধা গুলি পাব</p>
                    </div>
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="far fa-window-maximize feather"></i>
                                এস এম এস
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-code feather"></i>
                                ওয়ার্কশীট
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-mobile-alt feather"></i>
                                বেতন
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-code feather"></i>
                                পে স্লিপ
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-mobile-alt feather"></i>
                                রিপোর্ট
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-pen-nib feather"></i>
                                ডিমান্ড
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="fas fa-shopping-cart feather"></i>
                                নোটিফিকেশন
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box">
                                <i class="far fa-check-circle feather"></i>
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
                <h2>হিসাব সংরক্ষণ:</h2>
                <div class="bar"></div>
                <p>Lorem ipsum dolor amet, adipiscing, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.</p>
            </div>
            <div class="row">

              <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="single-features">
                      <div class="icon">
                          <i class="fas fa-bell"></i>
                      </div>
                      <h3>হিসাব সংরক্ষণ:</h3>
                      <p>"BCATS" এর মাধ্যমে নির্মাণ কাজের হিসাব সংরক্ষণ করুন সম্পূর্ণ ডিজিটাল পদ্ধতিতে এবং প্রয়োজন মতো যে কোন মুহূর্তে যে কোন স্থানে বসে পর্যবেক্ষণ করুন | ভবন নির্মাণ সংক্রান্ত হিসাব নিকাশের সঠিক তথ্য তাৎক্ষণিকভাবে পেতে ও প্রদান করতে "BCATS" আপনাকে সহায়তা করবে</p>
                  </div>
              </div>

                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="single-features">
                        <div class="icon">
                            <i class="fas fa-cog"></i>
                        </div>
                        <h3>মালামাল মজুদ ও সংরক্ষণ:</h3>
                        <p>সাইটে মালামালের দৈনন্দিন ব্যবহারের হিসাব রাখা, মালামালের স্টক সংরক্ষণ করা , কোন পণ্যের মজুদ কম আছে এবং আগামীতে কোন পণ্যটি প্রয়োজন তার নোটিফিকেশন প্রধানের মত কাজগুলো "BCATS" এর খুব সহজেই করে থাকে ,যা আপনার কাজের গতি ত্বরান্বিত করবে</p>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="single-features">
                        <div class="icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <h3>সমিতির সদস্যদের হিসাব:</h3>
                        <p>"BCATS" এর মাধ্যমে সমিতির সদস্যদের মাসিক কিস্তির সঠিক হিসাব রাখা যায় ডিজিটাল ভাবে। কমিটির কোন সদস্য মাসিক কিস্তি বকেয়া থাকলে অন্যান্য সদস্যরা "BCATS" সফটওয়্যার এর মাধ্যমে তা জানতে পারবে এবং তাকে কিস্তি প্রদানের জন্য তাগাদা দিতে পারবে</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="single-features">
                        <div class="icon">
                            <i class="fas fa-th-large"></i>
                        </div>
                        <h3>কাজের অগ্রগতি পর্যবেক্ষণ:</h3>
                        <p>"BCATS" ব্যবহার করে সাইট ইঞ্জিনিয়ার দৈনিক কাজের রিপোর্ট সাবমিট করবে ফলে ভবনের মালিক অথবা সমিতির সদস্যরা যেখানেই থাকুন না কেন তারা তাদের ভবনের কাজের বর্তমান অগ্রগতির রিপোর্ট এবং প্রয়োজনীয় পণ্যের লিস্ট সাথে সাথেই দেখতে পারবে</p>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="single-features">
                        <div class="icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <h3>সার্ভার ব্যাকআপ :</h3>
                        <p>নির্মাণাধীন প্রজেক্ট এর সমস্ত হিসাব নিকাশ “BCATS” ডিজিটাল ভাবে সংরক্ষন করে। খাতা-কলমে হিসাব করা যেমন সময় সাপেক্ষ ব্যাপার তেমনি  হিসাবের খাতা টি যেকোনো মুহূর্তে নষ্ট হয়ে বা হারিয়ে যেতে পারে কিন্তু "BCATS"এর মাধ্যমে ডাটা টি সার্ভারে থাকে যা  হারানো অসম্ভব</p>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="single-features">
                        <div class="icon">
                            <i class="fas fa-mouse-pointer"></i>
                        </div>
                        <h3>গুরুত্বপূর্ণ সিদ্ধান্ত গ্রহণ:</h3>
                        <p> প্রজেক্ট এর দায়িত্বশীল ব্যক্তি "BCATS"এর অ্যাপের মাধ্যমে কাজের বর্তমান অগ্রগতি পর্যালোচনা মাধ্যমে সঠিক সিদ্ধান্ত নেওয়া বা কোন পরিকল্পনার পর্যবেক্ষণ করার মাধ্যমে কাজটি সঠিক সময়ে সম্পূর্ণ করার সিদ্ধান্ত নিতে পারে। </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Team Member -->
    <!-- <div class="team-area ptb-80 bg-f9f6f6">
        <div class="container">
            <div class="section-title">
                <h2>Our Awesome team</h2>
                <div class="bar"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="team_slide">
            <div class="owl-carousel">

                <div class="item single-team">
                  <div class="team-img">
                      <img src="images/1.6abaae57.jpg" alt="">
                  </div>
                  <div class="team-content">
                      <div class="team-info">
                          <h3>Josh Buttler</h3>
                          <span>CEO & Founder</span>
                      </div>
                      <ul>
                          <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                          <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                      </ul>
                      <p>Risus commodo viverra maecenas accumsan lacus vel facilisis quis ipsum. </p>
                  </div>
                </div>

                <div class="item single-team">
                  <div class="team-img">
                      <img src="images/2.7b999e7f.jpg" alt="">
                  </div>
                  <div class="team-content">
                      <div class="team-info">
                          <h3>Alex Maxwel</h3>
                          <span>Marketing Manager</span>
                      </div>
                      <ul>
                          <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                          <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                      </ul>
                      <p>Risus commodo viverra maecenas accumsan lacus vel facilisis quis ipsum. </p>
                  </div>
                </div>

                <div class="item single-team">
                  <div class="team-img">
                      <img src="images/3.47bd3494.jpg" alt="">
                  </div>
                  <div class="team-content">
                      <div class="team-info">
                          <h3>Janny Cotller</h3>
                          <span>Web Developer</span>
                      </div>
                      <ul>
                          <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                          <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                      </ul>
                      <p>Risus commodo viverra maecenas accumsan lacus vel facilisis quis ipsum. </p>
                  </div>
                </div>

                <div class="item single-team">
                  <div class="team-img">
                      <img src="images/4.21d6a0fb.jpg" alt="">
                  </div>
                  <div class="team-content">
                      <div class="team-info">
                          <h3>Jason Statham</h3>
                          <span>CEO & Founder</span>
                      </div>
                      <ul>
                          <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                          <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                      </ul>
                      <p>Risus commodo viverra maecenas accumsan lacus vel facilisis quis ipsum. </p>
                  </div>
                </div>

                <div class="item single-team">
                  <div class="team-img">
                      <img src="images/5.0c02276b.jpg" alt="">
                  </div>
                  <div class="team-content">
                      <div class="team-info">
                          <h3>Corey Anderson</h3>
                          <span>Project Manager</span>
                      </div>
                      <ul>
                          <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                          <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                      </ul>
                      <p>Risus commodo viverra maecenas accumsan lacus vel facilisis quis ipsum. </p>
                  </div>
                </div>

              </div>
        </div>
    </div>

 funFact
    <div class="funfacts-area ptb-80">
        <div class="container">
            <div class="section-title">
                <h2>We always try to understand users expectation</h2>
                <div class="bar"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>

            <div class="row">

                <div class="col-md-3 col-6">
                    <div class="funfact">
                        <h3>1<span>+</span></h3>
                        <p>Downloaded</p>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="funfact">
                        <h3>8<span>+</span></h3>
                        <p>Feedback</p>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="funfact">
                        <h3>7<span>+</span></h3>
                        <p>Workers</p>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="funfact">
                        <h3>1<span>+</span></h3>
                        <p>Contributors</p>
                    </div>
                </div>

            </div>
            <div class="contact-cta-box">
                <h3>Have any question about us?</h3>
                <p>Don't hesitate to contact us</p>
                <a href="#" class="btn primary-btn text-uppercase">contact us</a>
            </div>

            <div class="map_img">
                <img src="images/map.caeeab2f.png" alt="">
            </div>
        </div>
    </div>

     work section
    <div class="works-area ptb-80 bg-f7fafd">
        <div class="container">
            <div class="section-title">
                <h2>Our Recent Works</h2>
                <div class="bar"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>

            <div class="work-slide">
                <div class="owl-carousel">

                    <div class="item single-work">
                        <img src="images/1.ad3c250e.jpg" alt="">
                        <div class="icon"><a href="#"><i class="fas fa-cog"></i></a>
                      </div>
                      <div class="works-content"><h4><a href="#">Incredible infrastructure</a></h4><p>Lorem ipsum dolor amet, adipiscing, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.</p></div>
                    </div>

                    <div class="item single-work">
                        <img src="images/2.e9cd4027.jpg" alt="">
                        <div class="icon"><a href="#"><i class="fas fa-cog"></i></a>
                      </div>
                      <div class="works-content"><h4><a href="#">Incredible infrastructure</a></h4><p>Lorem ipsum dolor amet, adipiscing, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.</p></div>
                    </div>

                    <div class="item single-work">
                        <img src="images/3.1a329ec9.jpg" alt="">
                        <div class="icon"><a href="#"><i class="fas fa-cog"></i></a>
                      </div>
                      <div class="works-content"><h4><a href="#">Incredible infrastructure</a></h4><p>Lorem ipsum dolor amet, adipiscing, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.</p></div>
                    </div>

                    <div class="item single-work">
                        <img src="images/4.8c006512.jpg" alt="">
                        <div class="icon"><a href="#"><i class="fas fa-cog"></i></a>
                      </div>
                      <div class="works-content"><h4><a href="#">Incredible infrastructure</a></h4><p>Lorem ipsum dolor amet, adipiscing, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.</p></div>
                    </div>

                    <div class="item single-work">
                        <img src="images/5.8b2d8581.jpg" alt="">
                        <div class="icon"><a href="#"><i class="fas fa-cog"></i></a>
                      </div>
                      <div class="works-content"><h4><a href="#">Incredible infrastructure</a></h4><p>Lorem ipsum dolor amet, adipiscing, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.</p></div>
                    </div>

                  </div>
            </div>
    </div>

     Pricing

    <div class="pricing-area ptb-80 bg-f9f6f6">
        <div class="container">
            <div class="section-title">
                <h2>Pricing Plans</h2>
                <div class="bar"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>

            <div class="row">

                <div class="col-md-4 col-sm-6">
                    <div class="pricing-table">
                        <div class="pricing-header">
                            <h3>Basic Plan</h3>
                        </div>
                        <div class="price">
                            <span><sup>$</sup>15.00<span>/Mon</span></span>
                        </div>
                        <div class="pricing-features"><ul><li class="active">5 GB Bandwidth</li><li class="active">Highest Speed</li><li class="active">1 GB Storage</li><li class="active">Unlimited Website</li><li class="active">Unlimited Users</li><li class="active">24x7 Great Support</li><li>Data Security and Backups</li><li>Monthly Reports and Analytics</li></ul></div>
                        <div class="pricing-footer">
                            <a href="#" class="btn primary-btn login-btn text-uppercase">select plan</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="pricing-table active-plane">
                        <div class="pricing-header">
                            <h3>ADVANCED PLAN</h3>
                        </div>
                        <div class="price">
                            <span><sup>$</sup>35.00<span>/Mon</span></span>
                        </div>
                        <div class="pricing-features"><ul><li class="active">5 GB Bandwidth</li><li class="active">Highest Speed</li><li class="active">1 GB Storage</li><li class="active">Unlimited Website</li><li class="active">Unlimited Users</li><li class="active">24x7 Great Support</li><li class="active">Data Security and Backups</li><li>Monthly Reports and Analytics</li></ul></div>
                        <div class="pricing-footer">
                            <a href="#" class="btn primary-btn login-btn text-uppercase">select plan</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="pricing-table">
                        <div class="pricing-header">
                            <h3>EXPERT PLAN</h3>
                        </div>
                        <div class="price">
                            <span><sup>$</sup>65.00<span>/Mon</span></span>
                        </div>
                        <div class="pricing-features"><ul><li class="active">5 GB Bandwidth</li><li class="active">Highest Speed</li><li class="active">1 GB Storage</li><li class="active">Unlimited Website</li><li class="active">Unlimited Users</li><li class="active">24x7 Great Support</li><li class="active">Data Security and Backups</li><li class="active">Monthly Reports and Analytics</li></ul></div>
                        <div class="pricing-footer">
                            <a href="#" class="btn primary-btn login-btn text-uppercase">select plan</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

     feedback area

    <div class="feedback-area ptb-80 bg-f7fafd">
        <div class="container">
            <div class="section-title">
                <h2>What users Saying</h2>
                <div class="bar"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="feedback-slider">
            <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:400px;overflow:hidden;visibility:hidden; padding-bottom: 20px;">
                 Loading Screen
                <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
                </div>
                <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
                    <div>
                        <div class="single-feedback">
                            <div class="client-img">
                                <img src="images/1.5c4c3867.jpg" alt="">
                            </div>
                            <h3>John Lucy</h3>
                            <span>Web Developer</span>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem velit sapiente ullam iusto? Nesciunt placeat beatae debitis perferendis suscipit totam reiciendis quam voluptas maiores minima doloribus molestias voluptates, vel exercitationem provident, autem, architecto fugiat distinctio ad. Nostrum at, debitis corrupti minus quo maxime obcaecati. Asperiores nostrum magnam possimus, saepe hic, ducimus facilis quam quibusdam accusamus in aut fugiat cum, deserunt repellat?</p>
                        </div>
                        <img src="images/1.5c4c3867.jpg"  data-u="thumb" alt="">
                    </div>
                    <div>
                        <div class="single-feedback">
                            <div class="client-img">
                                <img src="images/2.cd2c0c1a.jpg" data-u="thumb" alt="">
                            </div>
                            <h3>John Lucy</h3>
                            <span>Web Developer</span>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem velit sapiente ullam iusto? Nesciunt placeat beatae debitis perferendis suscipit totam reiciendis quam voluptas maiores minima doloribus molestias voluptates, vel exercitationem provident, autem, architecto fugiat distinctio ad. Nostrum at, debitis corrupti minus quo maxime obcaecati. Asperiores nostrum magnam possimus, saepe hic, ducimus facilis quam quibusdam accusamus in aut fugiat cum, deserunt repellat?</p>
                        </div>
                        <img src="images/2.cd2c0c1a.jpg" data-u="thumb" alt="">
                    </div>
                    <div>
                        <div class="single-feedback">
                            <div class="client-img">
                                <img src="images/3.c8868f36.jpg" alt="">
                            </div>
                            <h3>John Lucy</h3>
                            <span>Web Developer</span>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem velit sapiente ullam iusto? Nesciunt placeat beatae debitis perferendis suscipit totam reiciendis quam voluptas maiores minima doloribus molestias voluptates, vel exercitationem provident, autem, architecto fugiat distinctio ad. Nostrum at, debitis corrupti minus quo maxime obcaecati. Asperiores nostrum magnam possimus, saepe hic, ducimus facilis quam quibusdam accusamus in aut fugiat cum, deserunt repellat?</p>
                        </div>
                        <img src="images/3.c8868f36.jpg" data-u="thumb" alt="">
                    </div>
                    <div>
                        <div class="single-feedback">
                            <div class="client-img">
                                <img src="images/4.9a179115.jpg" alt="">
                            </div>
                            <h3>John Lucy</h3>
                            <span>Web Developer</span>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem velit sapiente ullam iusto? Nesciunt placeat beatae debitis perferendis suscipit totam reiciendis quam voluptas maiores minima doloribus molestias voluptates, vel exercitationem provident, autem, architecto fugiat distinctio ad. Nostrum at, debitis corrupti minus quo maxime obcaecati. Asperiores nostrum magnam possimus, saepe hic, ducimus facilis quam quibusdam accusamus in aut fugiat cum, deserunt repellat?</p>
                        </div>
                        <img src="images/4.9a179115.jpg"  data-u="thumb" alt="">
                    </div>
                    <div>
                        <div class="single-feedback">
                            <div class="client-img">
                                <img src="images/3.c8868f36.jpg" alt="">
                            </div>
                            <h3>John Lucy</h3>
                            <span>Web Developer</span>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem velit sapiente ullam iusto? Nesciunt placeat beatae debitis perferendis suscipit totam reiciendis quam voluptas maiores minima doloribus molestias voluptates, vel exercitationem provident, autem, architecto fugiat distinctio ad. Nostrum at, debitis corrupti minus quo maxime obcaecati. Asperiores nostrum magnam possimus, saepe hic, ducimus facilis quam quibusdam accusamus in aut fugiat cum, deserunt repellat?</p>
                        </div>
                        <img src="images/3.c8868f36.jpg" data-u="thumb" alt="">
                    </div>
                    <div>
                        <div class="single-feedback">
                            <div class="client-img">
                                <img src="images/4.9a179115.jpg" alt="">
                            </div>
                            <h3>John Lucy</h3>
                            <span>Web Developer</span>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem velit sapiente ullam iusto? Nesciunt placeat beatae debitis perferendis suscipit totam reiciendis quam voluptas maiores minima doloribus molestias voluptates, vel exercitationem provident, autem, architecto fugiat distinctio ad. Nostrum at, debitis corrupti minus quo maxime obcaecati. Asperiores nostrum magnam possimus, saepe hic, ducimus facilis quam quibusdam accusamus in aut fugiat cum, deserunt repellat?</p>
                        </div>
                        <img src="images/4.9a179115.jpg"  data-u="thumb" alt="">
                    </div>
                </div><a data-scale="0" href="https://www.jssor.com" style="display:none;position:absolute;">web animation</a>
                 Thumbnail Navigator
                <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;bottom:0px;width:980px;height:100px;background-color:#000;" data-autocenter="1" data-scale-bottom="0.75">
                    <div data-u="slides">
                        <div data-u="prototype" class="p" style="width:190px;height:90px;">
                            <div data-u="thumbnailtemplate" class="t"></div>
                             <svg viewbox="0 0 16000 16000" class="cv">
                                <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                                <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                                <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                            </svg>
                        </div>
                    </div>
                </div>
                 Arrow Navigator
                <div data-u="arrowleft" class="jssora106" style="width:55px;height:55px;top:162px;left:30px;" data-scale="0.75">
                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                        <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                        <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
                    </svg>
                </div>
                <div data-u="arrowright" class="jssora106" style="width:55px;height:55px;top:162px;right:30px;" data-scale="0.75">
                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                        <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                        <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="ready-to-talk">
        <div class="container">
            <h3>Ready to talk?</h3>
            <p>Our team is here to answer your question about Start</p>
            <a href="#" class="btn primary-btn">contact us</a>
            <span><a href="#">Or, get started now with a free trial</a></span>
        </div>
    </div>

    <div class="partner-area partner-section">
        <div class="container">
            <h5>More that 1.5 million businesses and organizations use StartP</h5>
            <div class="partner-inner">
                <div class="row">

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="#">
                            <img src="images/airbnb-lite.png" alt="">
                            <img src="images/airbnb.png" alt="">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="#">
                            <img src="images/slack-lite.png" alt="">
                            <img src="images/slack.png" alt="">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="#">
                            <img src="images/envato-lite.png" alt="">
                            <img src="images/envato.png" alt="">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="#">
                            <img src="images/themforest-lite.png" alt="">
                            <img src="images/themforest.png" alt="">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="#">
                            <img src="images/node-lite.png" alt="">
                            <img src="images/node.png" alt="">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="#">
                            <img src="images/github-lite.png" alt="">
                            <img src="images/github.png" alt="">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="#">
                            <img src="images/rails-lite.png" alt="">
                            <img src="images/rails.png" alt="">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="#">
                            <img src="images/stylus-lite.png" alt="">
                            <img src="images/stylus.png" alt="">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="#">
                            <img src="images/metor-lite.png" alt="">
                            <img src="images/metor.png" alt="">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="#">
                            <img src="images/drive-lite.png" alt="">
                            <img src="images/drive.png" alt="">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="#">
                            <img src="images/robot-lite.png" alt="">
                            <img src="images/robot.png" alt="">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="#">
                            <img src="images/cog-lite.png" alt="">
                            <img src="images/cog.png" alt="">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="#">
                            <img src="images/axios-lite.png" alt="">
                            <img src="images/axios.png" alt="">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="#">
                            <img src="images/angular-lite.png" alt="">
                            <img src="images/angular.png" alt="">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="#">
                            <img src="images/nick-lite.png" alt="">
                            <img src="images/nick.png" alt="">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="#">
                            <img src="images/slack-lite.png" alt="">
                            <img src="images/slack.png" alt="">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="#">
                            <img src="images/open-lite.png" alt="">
                            <img src="images/open.png" alt="">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="#">
                            <img src="images/amazon-lite.png" alt="">
                            <img src="images/amazon.png" alt="">
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div> -->
<!-- blog area
    <div class="blog-area ptb-80">
        <div class="container">
            <div class="section-title">
                <h2>The News From Our Blog</h2>
                <div class="bar"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="row p-4">

                <div class="col-md-4 col-sm-6">
                    <div class="single-blog-post rounded">
                        <div class="blog-img">
                            <a href="#">
                                <img src="images/1.26b1df40.jpg" alt="blog img">
                            </a>
                            <div class="date">
                                <i class="far fa-calendar-alt"></i>  March 15, 2019
                            </div>
                        </div>
                        <div class="blog-post-content">
                            <h3><a href="#">The security risks of changing package owners</a></h3>
                            <span>by <a href="#">admin</a></span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                            <a class="read-more-btn" href="#">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="single-blog-post rounded">
                        <div class="blog-img">
                            <a href="#">
                                <img src="images/2.1e5a0c17.jpg" alt="blog img">
                            </a>
                            <div class="date">
                                <i class="far fa-calendar-alt"></i>  March 15, 2019
                            </div>
                        </div>
                        <div class="blog-post-content">
                            <h3><a href="#">The security risks of changing package owners</a></h3>
                            <span>by <a href="#">admin</a></span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                            <a class="read-more-btn" href="#">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="single-blog-post rounded">
                        <div class="blog-img">
                            <a href="#">
                                <img src="images/3.be7d6afc.jpg" alt="blog img">
                            </a>
                            <div class="date">
                                <i class="far fa-calendar-alt"></i>  March 15, 2019
                            </div>
                        </div>
                        <div class="blog-post-content">
                            <h3><a href="#">The security risks of changing package owners</a></h3>
                            <span>by <a href="#">admin</a></span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                            <a class="read-more-btn" href="#">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
 </div> -->

    <footer class="footer-area bg-f7fafd">
        <div class="container">
            <img src="{{ asset('home') }}/images/map.caeeab2f.png" alt="" class="map">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="logo">
                            <a href="#">
                                <img src="{{ asset('home') }}/images/logo.png" alt="">
                            </a>
                        </div>
                        <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget pl-5"><h3>Company</h3><ul class="list"><li><a href="#">About Us</a></li><li><a href="#">Services</a></li><li><a href="#">Features</a></li><li><a href="#">Our Pricing</a></li><li><a href="#">Latest News</a></li></ul></div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget"><h3>Support</h3><ul class="list"><li><a href="#">FAQ's</a></li><li><a href="#">Privacy Policy</a></li><li><a href="#">Terms &amp; Condition</a></li><li><a href="#">Community</a></li><li><a href="#">Contact Us</a></li></ul></div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h3>Address</h3>
                        <ul class="footer-contact-info">
                            <li><i class="fas fa-map-marker-alt"></i> 27 Division St, New York, NY 10002, USA</li>
                            <li><i class="far fa-envelope"></i> Email: startp@gmail.com</li>
                            <li><i class="fas fa-phone"></i> Phone: + (321) 984 754</li>
                        </ul>
                        <ul class="social-links">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                          <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12"><div class="copyright-area"><p>Copyright ©2020 BCATS. All Rights Reserved</p></div></div>
            </div>
        </div>
    </footer>
    <script type="text/javascript">jssor_1_slider_init();
    </script>
    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
          margin: 10,
          loop: true,
          autoplay: true,
          touchDrag:true,
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
    <script src="{{ asset('home') }}js/app.js"></script>

    </body>
</html>
