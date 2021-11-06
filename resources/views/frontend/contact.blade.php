@extends('layouts.frontend-master')
@section('title')
    যোগাযোগ | আমার স্টুডেন্ট
@endsection
@section('styles')
@endsection
@section('content')


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
    </div>

@endsection
@section('scripts')
@endsection
