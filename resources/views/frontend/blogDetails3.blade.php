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
                            <img src="{{ asset('frontend/images/weak-student.png') }}" alt="image" />
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
                            <h3>দুর্বল ছাত্র-ছাত্রীদের কিভাবে পড়াশোনার প্রতি আগ্রহী করা যায়?
                            </h3>
                            <p>
                                পৃথিবীর প্রত্যেকটা মানুষের মধ্যে যেমন শারীরিক ও চারিত্রিক ভিন্নতা রয়েছে, তেমনি মেধার দিক
                                থেকেও সবাই সমান না। কেউ বেশি মেধাবী, কেউ কম মেধাবী, কেউ বা আবার মেধা থাকা সত্ত্বেও নানান রকম
                                শারীরিক বা পারিপার্শ্বিক সমস্যার কারণে মেধার বিকাশ বা প্রকাশ ঘটাতে পারে না।
                                কোন শিক্ষার্থী যখন পড়াশুনার প্রতি অমনোযোগী থাকে তাকেই আমরা সাধারণত দুর্বল শিক্ষার্থী বা
                                পিছিয়ে পড়া শিক্ষার্থী বলে থাকি। অনেক সময় অমনোযোগী বা দুর্বল শিক্ষার্থীদের আমরা না বুঝে
                                তিরস্কার করে থাকি যা তাদের জন্য খুবই ঝুঁকিপূর্ণ। অনেক সময় তা শিক্ষার্থীর শিক্ষাজীবন কে
                                ধ্বংস করে দিতে পারে। একজন দুর্বল শিক্ষার্থীকে লেখাপড়ার প্রতি মনোযোগী করতে হলে কিছু বিষয়ের
                                প্রতি বিশেষ লক্ষ্য রাখতে হবে -

                            </p>
                            <p>
                                ১। দুর্বল শিক্ষার্থীর প্রতি সহানুভূতিশীল ও সহমর্মী আচরণ করতে হবে।
                            <br>
                                ২। শিক্ষার্থীর দুর্বলতা বা অমনোযোগিতার কারণ চিহ্নিত করে তার সমাধানের ব্যবস্থা করতে হবে।
                            <br>
                                ৩। শিক্ষার্থীর লেখাপড়ার প্রতি আগ্রহ সৃষ্টি করতে প্রয়োজনীয় পদক্ষেপ গ্রহণ করতে হবে।
                            <br>
                                ৪। শিক্ষা প্রতিষ্ঠানের পরিবেশ আকর্ষণীয় করতে হবে যাতে শিক্ষার্থীরা শিক্ষাপ্রতিষ্ঠানে যেতে
                                আগ্রহী হয়।
                           <br>
                                ৫। শিক্ষার্থীর গৃহের পরিবেশ পাঠের উপযোগী করতে হবে।
                            <br>
                                ৬। পাঠদানের সময় শিক্ষার্থীর বয়স, আগ্রহ, গ্রহণ ক্ষমতা, চাহিদা ইত্যাদি বিবেচনায় আনতে হবে।
                            <br>
                                ৭। দুর্বল শিক্ষার্থীরা যাতে শ্রেণিকক্ষে কোন প্রকার বৈষম্যের শিকার না হয় সেদিকে খেয়াল রাখতে
                                হবে।
                            <br>
                                ৮। অংশগ্রহণমূলক পদ্ধতিতে পাঠদান করতে হবে।
                            <br>
                                ৯। পড়াশোনার পাশাপাশি বিনোদন মূলক কার্যক্রমের সুযোগ করে দিতে হবে।
                            <br>
                                ১০। শিক্ষার্থীর মধ্যে প্রতিযোগিতামূলক মনোভাব সৃষ্টি করতে হবে।
                            <br>
                                ১১। একবার কোন বিষয়ে ব্যর্থ হলে তিরস্কার না করে পুনরায় চেষ্টার জন্য উৎসাহিত করতে হবে।
                            <br>
                                ১২। কোন বিষয়ে সফল হলে বারবার প্রশংসা করতে হবে।
                            </p>
                            <p class=" mt-5">
                                দুর্বল শিক্ষার্থীদের যদি প্রকাশ্যে চিহ্নিত করা হয় বা তিরস্কার করা হয় কোনো কোনো ক্ষেত্রে
                                তারা সামাজিক ভাবে হেয় প্রতিপন্ন এবং বৈষম্যের শিকার হতে পারে। সে ব্যাপারে সজাগ দৃষ্টি রাখা
                                প্রয়োজন। সকলের সযত্ন প্রয়াস এবং সহযোগিতামূলক মনোভাবই পারে একজন দুর্বল শিক্ষার্থীকে
                                পড়ালেখায় আগ্রহী করতে। মনে রাখতে হবে শুধু পরীক্ষায় ভালো ফলাফল করাই শিক্ষার মূল উদ্দেশ্য
                                নয়- জ্ঞান, দক্ষতা এবং দৃষ্টিভঙ্গির উন্নয়নই শিক্ষার মূল উদ্দেশ্য।
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
