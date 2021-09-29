@extends('layouts.frontend-master')
@section('title')
    ব্লগ | আমার স্টুডেন্ট
@endsection
@section('styles')
    <style>
        .article-image img {
            max-height: 400px;
            width: 100%;
        }

        .blocks-gallery-item img {
            min-height: 150px;
            width: 100%;
        }

        .fullimage img {
            min-height: 100px;
            width: 100%;
        }

    </style>
@endsection
@section('content')

    <section class="blog-details-area ptb-80 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-details-desc">
                        <div class="article-image">
                            <img src="{{ asset('frontend/images/coaching-software.png') }}" alt="image" />
                        </div>
                        <div class="article-content">
                            <div class="entry-meta">
                                <ul>
                                    <li>
                                        <i data-v-07452373="" data-name="clock" data-tags="time,watch,alarm"
                                            data-type="clock" class="feather feather--clock"><svg data-v-07452373=""
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-clock feather__content">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <polyline points="12 6 12 12 16 14"></polyline>
                                            </svg></i>
                                        <a href="#">September 31, 2020</a>
                                    </li>
                                    <li>
                                        <i data-v-07452373="" data-name="user" data-tags="person,account" data-type="user"
                                            class="feather feather--user"><svg data-v-07452373=""
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-user feather__content">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg></i>
                                        <a href="#">Steven Smith</a>
                                    </li>
                                </ul>
                            </div>
                            <h3>সফটওয়্যার কিভাবে সাহয্য করতে পারে...?
                            </h3>
                            <p>
                                বর্তমান যুগ প্রযুক্তির যুগ । মানুষের বেডরুম থেকে শুরু করে মহাকাশ পর্যন্ত প্রত্যেকটি ক্ষেত্রে
                                রয়েছে প্রযুক্তির ছোঁয়া । তাই তথ্যপ্রযুক্তির এই যুগে প্রযুক্তির ব্যবহার ছাড়া একটি
                                প্রতিষ্ঠান পরিচালনার কথা আপনি স্বপ্নেও ভাবতে পারবেন না । অন্যান্য ক্ষেত্রের মতো শিক্ষা
                                ব্যাবস্থা পরিচালনার ক্ষেত্রে ও রয়েছে প্রযুক্তির ব্যাপক ব্যবহার । একটি কোচিং সেন্টার
                                পরিচালনা করতে হলে কোচিং ম্যানেজমেন্ট সফটওয়্যার এর গুরুত্ব অনেক বেশি । একটি কোচিং সেন্টারে
                                এমন অনেক কাজ আছে যেগুলো মানুষের হাতে করতে গেলে যেমনি কষ্ট তেমনি অনেক সময়ের ও ব্যাপার । আবার
                                অনেক সময় এত সব তথ্য মূলক কাজগুলো হাতে করতে গেলে কোন তথ্য ভুল হয়ে যেতে পারে । সেইসব
                                কাজগুলোর মধ্যে রয়েছে –
                            </p>
                            <p>
                                ১। কোচিং সেন্টার সম্পর্কে তথ্য সংরক্ষণ করা ।
                            <br>
                                ২। শিক্ষকদের তথ্য সংরক্ষণ এবং বেতন বোনাস ইত্যাদি সম্পর্কে তথ্য আপডেট করা ।
                            <br>
                                ৩। শিক্ষার্থীদের ভর্তি, পরীক্ষা, ক্লাস, হাজিরা ইত্যাদি তথ্য সংরক্ষণ এবং তাদের প্রগ্রেস
                                সম্পর্কে নিয়মিত রিপোর্ট করা ।
                            <br>
                                ৪। ম্যানেজিং কমিটির বিভিন্ন তথ্য সংরক্ষণ ও আপডেট করা ।
                            <br>
                                ৫। অভিভাবকদের তথ্য সংরক্ষন করা ।
                           <br>
                                ৬। বিভিন্ন পাবলিক পরীক্ষা সহ অন্যান্য ক্ষেত্রে প্রতিষ্ঠান এর সফলতার তথ্য সংরক্ষণ ও আপটুডেট
                                করা ।
                            </p>
                            <p class=" mt-5">
                                ইত্যাদি আরো অনেক কাজ হতে পারে । কিন্তু যদি এসব কাজগুলো কোচিং ম্যানেজমেন্ট সফটওয়্যার এর
                                সাহায্যে করা যায় তাহলে কষ্ট ও সময় দুটোই বেঁচে যায় এবং নির্ভুলভাবে কাজ গুলো সম্পাদন করা
                                যায় । তাই একটি আধুনিক কোচিং সেন্টারে কোচিং ম্যানেজমেন্ট সফটওয়্যার এর ব্যবহার অপরিহার্য ।
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <aside class="widget-area">
                        <section class="widget widget_search">
                            <form class="search-form">
                                <label><span class="screen-reader-text">Search for:</span><input type="search"
                                        placeholder="Search..." class="search-field" /></label><button type="submit">
                                    <i data-v-07452373="" data-name="search" data-tags="find,magnifier,magnifying glass"
                                        data-type="search" class="feather feather--search"><svg data-v-07452373=""
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-search feather__content">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg></i>
                                </button>
                            </form>
                        </section>
                        <section class="widget widget_startp_posts_thumb">
                            <h3 class="widget-title">Popular Posts</h3>
                            <article class="item">
                                <a href="{{ route('blog.details3') }}" class="thumb"><span role="img"
                                        class="fullimage cover">
                                        <img src="{{ asset('frontend/images/weak-student1.png') }}"
                                            alt="image" /></span></a>
                                <div class="info">
                                    <time datetime="2021-06-30">September 05, 2021</time>
                                    <h5 class="title usmall">
                                        <a href="{{ route('blog.details3') }}">দুর্বল ছাত্রীদের কিভাবে আগ্রহী করা যায়
                                            ?</a>
                                    </h5>
                                </div>
                                <div class="clear"></div>
                            </article>
                            <article class="item">
                                <a href="{{ route('blog.details4') }}" class="thumb"><span role="img"
                                        class="fullimage cover">
                                        <img src="{{ asset('frontend/images/student-playing.png') }}"
                                            alt="image" /></span></a>
                                <div class="info">
                                    <time datetime="2021-06-30">August 21, 2021</time>
                                    <h5 class="title usmall">
                                        <a href="{{ route('blog.details4') }}">পড়াশোনার পাশাপাশি বিনোদনের গুরুত্ব.</a>
                                    </h5>
                                </div>
                                <div class="clear"></div>
                            </article>
                            <article class="item">
                                <a href="{{ route('blog.details5') }}" class="thumb"><span role="img"
                                        class="fullimage cover">
                                        <img src="{{ asset('frontend/images/student-study.png') }}" alt="image" />
                                    </span></a>
                                <div class="info">
                                    <time datetime="2021-06-30">August 10, 2021</time>
                                    <h5 class="title usmall">
                                        <a href="{{ route('blog.details5') }}">কিভাবে পড়াশোনায় মনোযোগী
                                            করা যায়</a>
                                    </h5>
                                </div>
                                <div class="clear"></div>
                            </article>

                            <article class="item">
                                <a href="{{ route('blog.details') }}" class="thumb"><span role="img"
                                        class="fullimage cover">
                                        <img src="{{ asset('frontend/images/coaching-software.png') }}"
                                            alt="image" /></span></a>
                                <div class="info">
                                    <time datetime="2021-06-30">June 10, 2021</time>
                                    <h5 class="title usmall">
                                        <a href="{{ route('blog.details2') }}">সফটওয়্যার কিভাবে সাহয্য করতে পারে...?</a>
                                    </h5>
                                </div>
                                <div class="clear"></div>
                            </article>
                            <article class="item">
                                <a href="{{ route('blog.details') }}" class="thumb"><span role="img"
                                        class="fullimage cover">
                                        <img src="{{ asset('frontend/images/coaching.png') }}" alt="image" /></span></a>
                                <div class="info">
                                    <time datetime="2021-06-30">June 21, 2021</time>
                                    <h5 class="title usmall">
                                        <a href="{{ route('blog.details1') }}">কোচিং ম্যানেজমেন্ট এর গুরুত্ব...</a>
                                    </h5>
                                </div>
                                <div class="clear"></div>
                            </article>
                            <article class="item">
                                <a href="{{ route('blog.details') }}" class="thumb"><span role="img"
                                        class="fullimage cover">
                                        <img src="{{ asset('frontend/images/teacher3.png') }}" alt="image" /> </span></a>
                                <div class="info">
                                    <time datetime="2021-06-30">June 30, 2021</time>
                                    <h5 class="title usmall">
                                        <a href="{{ route('blog.details') }}">একজন ভালো শিক্ষকের গুণাবলী ...</a>
                                    </h5>
                                </div>
                                <div class="clear"></div>
                            </article>
                        </section>
                    </aside>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
@endsection
