<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->

        <title>BCATS | Home</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl.theme.default.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

        <script src="{{ asset('frontend') }}/assets/js/jquery.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/owl.carousel.js"></script>

        <script src="{{ asset('frontend') }}/assets/js/jssor.slider-28.1.0.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/jssor.slider.js"></script>
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/jssor.slider.css">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/4b5d72e539.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.min.css">

    </head>
    <body class="antialiased">
<noscript><strong>We're sorry but This Website doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript>
    <header>
        <div class="bg-light fixed-top py-1">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container position-relative">
                    <div class="logo_img navbar-brand">
                        <a href="/"><img src="{{ asset('frontend') }}/assets/images/logo.png" alt="Logo" class="logo"></a>
                    </div>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav menu">

                      <li class="nav-item"><a class="d-block primary-btn text-dark support-btn" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item"><a class="d-block primary-btn text-dark support-btn" href="{{ url('/contact') }}">Contact</a></li>
                        <div class="top-btn">
                            {{-- <button id="login_btn" class="primary-btn login-btn">Login</button> --}}
                            <a href="{{ url('login') }}" class="btn primary-btn login-btn text-uppercase">Login</a>

                        </div>
                    </ul>
                  </div>
                </div>
              </nav>

        </div>
    </header>
    <!-- end header -->

    {{-- Contact-Page-Start --}}
    <div class="box-area ptb-80 mt-5">
  

        <!-- get in touch -->
        <div class="getInTouch">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Get In Touch</h2>
                    <div class="bar"></div>
                    <p class="text-capitalize">Anythings On you Mind. We'll be Glad to assist you</p>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <img src="{{ asset('frontend/images/aboutImg.png') }}" alt="">
                    </div>
                    <div class="col-md-6">
                        <div class="p-1 contact-form">
                            <form action="">
                                <input class="input_text" placeholder="Name" type="text">
                                <input class="input_text" placeholder="Email" type="email" name="" id="">
                                <input class="input_text" placeholder="Phone" type="text">
                                <input class="input_text" placeholder="Subject" type="text">
                                <textarea class="input_text" placeholder="Your Message" name="" id="" cols="30"
                                    rows="10"></textarea>
                                <button class="btn primary-btn" type="submit">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer-area bg-f7fafd">
        <div class="container">
            <img src="{{ asset('frontend') }}/assets/images/map.caeeab2f.png" alt="" class="map">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="logo">
                            <a href="#">
                                <img src="{{ asset('frontend') }}/assets/images/logo.png" alt="">
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
    <script src="{{ asset('frontend') }}/assetsjs/app.js"></script>

    </body>
</html>
