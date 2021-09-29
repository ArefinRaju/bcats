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
                            <img src="{{ asset('frontend/images/teacher3.png') }}" alt="image" />
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
                            <h3>একজন ভালো শিক্ষকের গুণাবলী ...</h3>
                            <p>
                                জন অ্যাডামস শিক্ষককে “Maker of Man” বলে অভিহিত করেছেন। তিনি আরো বলেছেন,” শিক্ষক হলেন জাতির
                                আলোকবর্তিকাবাহি এবং মানব জাতির ভবিষ্যৎ রূপকার।”
                                আধুনিক শিক্ষার্থী কেন্দ্রিক শিক্ষায় শিক্ষকের ভূমিকা গৌণ হলেও শিক্ষকের সাহায্য ছাড়া কোন
                                শিক্ষা সম্ভব নয়। যে কোনো শিক্ষাকে ফলপ্রসূ করতে হলে চাই আদর্শ শিক্ষক। আদর্শ শিক্ষক হতে গেলে
                                কতগুলি বিশেষ গুণ থাকা প্রয়োজন। আদর্শ শিক্ষকের গুণাবলী কে প্রধানত তিনটি ভাগে ভাগ করা যায়।
                            </p>
                            <p>
                                ১। ব্যক্তিগত গুণাবলী-
                                একজন শিক্ষকের ব্যক্তিগত আচার-আচরণ শিক্ষার্থীর মনের উপর গভীর রেখাপাত করে। তাই ব্যক্তিগতভাবে
                                শিক্ষককে হতে হবে চরিত্রবান, দায়িত্বশীল এবং ব্যক্তিত্বসম্পন্ন। অর্থাৎ তার পোশাক-আশাক,
                                কথাবার্তা, আচার আচরণের মধ্যে এমন মাধুর্য থাকতে হবে যাতে তাকে দেখলেই শিক্ষার্থীদের মধ্যে
                                ইতিবাচক মনোভাব সৃষ্টি হয়। শিক্ষককে তার প্রতিটি কাজেই নিয়মানুবর্তিতার প্রতি বিশেষ গুরুত্ব
                                দিতে হবে। শিক্ষকের দৃষ্টিভঙ্গি যথেষ্ট উদার ও ব্যাপক অর্থাৎ প্রগতিশীল হতে হবে। ধৈর্যশীলতা,
                                নিরপেক্ষতা একজন ভালো শিক্ষক এর অপরিহার্য গুন। ছাত্র-ছাত্রীদের প্রতি ভালোবাসা ও সহানুভূতি
                                থাকতে হবে। শিক্ষকতা পেশার প্রতি ভালোবাসা ও সম্মান থাকতে হবে। অর্থাৎ সর্বোপরি একজন ভালো
                                শিক্ষক ব্যক্তিগতভাবে উন্নত জীবন আদর্শী এবং জ্ঞানপিপাসু হবেন। তাহলেই তাকে দেখে শিক্ষার্থীদের
                                মধ্যে ভালো মানুষ হওয়ার প্রতি ও জ্ঞান অর্জনের প্রতি উৎসাহ সৃষ্টি হবে। এছাড়াও শিক্ষককে
                                শারীরিক ও মানসিকভাবে সুস্বাস্থ্যের অধিকারী হতে হবে
                            </p>
                            <p>
                                ২। পেশাগত গুণাবলী-
                                একজন আদর্শ শিক্ষকের বিষয়বস্তুর জ্ঞান থাকা প্রয়োজন। শিক্ষকের মধ্যে শিক্ষার্থীর মানসিক
                                অবস্থা বোঝার ক্ষমতা থাকতে হবে আর তাই অবশ্যই তার মনোবিজ্ঞানের ধারণা থাকা উচিত । আধুনিক শিক্ষা
                                ব্যবস্থার শিখন পদ্ধতি গুলো সম্পর্কে জ্ঞান থাকা অপরিহার্য। বিভিন্ন রকম শিক্ষা উপকরণ ব্যবহার
                                করে শিক্ষণ শিখন পদ্ধতি কে সজীব ও প্রাণবন্ত করে তোলার দক্ষতা থাকতে হবে। একজন আদর্শ শিক্ষকের
                                একটি অন্যতম পেশাগত গুন হলো তার গবেষণামূলক মনোভাব। এছাড়া একজন আদর্শ শিক্ষকের
                                শিক্ষাপ্রতিষ্ঠানের সব নিয়মকানুন সম্পর্কে জানতে হবে এবং তা মানতে হবে। আর একজন ভালো শিক্ষকের
                                সবচেয়ে গুরুত্বপূর্ণ পেশাগত গুন হল শ্রেণিকক্ষে মূল্যায়ন সম্পর্কিত জ্ঞান ও প্রশ্ন করার
                                দক্ষতা। কারণ এর মাধ্যমেই শ্রেণিকক্ষে শিক্ষক ও শিক্ষার্থীর মধ্যে যোগাযোগ স্থাপন হয় এবং
                                শিক্ষণ শিখন প্রক্রিয়া গতিশীল হয়।
                            </p>

                            <p>
                                ৩। নাগরিক হিসেবে গুণাবলী-
                                একজন ভালো শিক্ষক কে অবশ্যই সুনাগরিক হতে হবে। রাষ্ট্রের প্রতি অনুগত থেকে নাগরিক হিসেবে সব
                                দায়িত্ব পালন করতে হবে এবং সমাজের প্রতি সেবামূলক মনোভাব থাকতে হবে।

                                শিক্ষকের কিছু গুণাবলী যেমন জন্মগত তেমনি কিছু গুণাবলী অর্জিত। অর্থাৎ শিক্ষক যেমন জন্মায় তেমন
                                তৈরিও হয়। মনে রাখতে হবে একজন ভালো শিক্ষক হাজার ছাত্রের ভবিষ্যৎ ভালো মানুষ হবার অনুপ্রেরণা।
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
