<!DOCTYPE html>
<html lang="en">

<head>
    <title>এডমিশন | আমার স্টুডেন্ট</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
        #bottom_input {
            opacity: 1;
        }

        #form_section {
            opacity: 1;
            z-index: 99999;
        }

        .faq-accordion {
            height: 570px;
        }

        .admission-select {
            cursor: pointer;
        }

        .getadmission {
            padding: 20px 15px 20px 15px;
            box-shadow: 0 0 18px 0 rgb(0 0 0 / 8%);
        }

        .faq-accordion {
            padding: 25px 15px;
        }

        .login-page select {
            padding: 6px 10px;
            cursor: pointer;
        }

        .admission-list a {
            padding: 9px 17px !important;
            background-color: rgb(152 0 255)
        }

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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Admissions List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dt-responsive nowrap" style="100%">
                                    <thead>
                                        <tr>
                                            <th class=" text-center">Admission-Name</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admissions as $result)
                                            <tr class="">
                                            <th class="">{{ $result->admission_name }}</th>
                                            <td class=" 
                                                ">
                                                {{ $result->className->class_name }}</td>
                                                <td class="">
                                                {{ $result->section->section_name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="
                                                    row mt-4">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4>To Get Admission</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="form-control">
                                                                    <label for="admissionDetails">Please Admission
                                                                        Select</label>
                                                                    <select name="admission_id" id="admissionDetails"
                                                                        class="admission-select">
                                                                        <option value="" selected>Select Admission Name
                                                                        </option>
                                                                        @foreach ($admissions as $result)
                                                                            <option value="{{ $result->id }}">
                                                                                {{ $result->admission_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                            </div>
                            <div id="outputAdmission" class="outputAdmission">

                            </div>
                        </div>
    </section>

    <script src="{{ asset('frontend/admission/js/app.js') }}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

    <script>
        $("#admissionDetails").change(function() {
            var admission_id = $(this).val();
            var url = "{{ route('show-admission-details') }}";
            if (admission_id != '') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'post',
                    url: url,
                    data: {
                        admission_id: admission_id
                    },
                    success: function(data) {
                        $('#outputAdmission').html(data);
                        $('#hidden_id').val(admission_id);
                        var id = $('#hidden_id').val();
                    }
                });
            } else {
                $('#outputAdmission').html('');
            }
        });
    </script>
</body>

</html>
