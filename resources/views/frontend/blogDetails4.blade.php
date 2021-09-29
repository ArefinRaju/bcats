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
                            <img src="{{ asset('frontend/images/student-playing.png') }}" alt="image" />
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
                            <h3>পড়াশোনার পাশাপাশি বিনোদনের গুরুত্ব
                            </h3>
                            <p>
                                আজকাল বিনোদনের অন্যতম মাধ্যম হচ্ছে মোবাইল, সোশ্যাল মিডিয়া বা টেলিভিশন। এছাড়াও অনেকে
                                খেলাধুলা, ঘুরে বেড়ান, সাংস্কৃতিক কার্যক্রম বা সাহিত্যচর্চা করে ও সময় কাটাতে পছন্দ করে।
                                কিন্তু যখন শিক্ষার সাথে বিনোদন সম্পর্কিত বিষয় আসে, তখন বেশিরভাগ মানুষই বলে, এসব বিনোদনমূলক
                                কার্যক্রম অযথা সময় নষ্ট। এই ধারণাটি সম্পূর্ণ ভুল।

                            </p>
                            <p>
                                লেখাপড়ার পাশাপাশি বিনোদনের গুরুত্বপূর্ণ ভূমিকা রয়েছে। এসব বিনোদনমূলক কার্যক্রম
                                শিক্ষার্থীকে বিভিন্ন জ্ঞানমূলক, সামাজিক এবং মানসিক বিকাশে সহায়তা করে। সাম্প্রতিক গবেষণায়
                                দেখা গেছে- একটানা একঘেয়ে শিক্ষাব্যবস্থা পড়ালেখার প্রতি শিক্ষার্থীদের মনোযোগ নষ্ট করে।
                                পড়ালেখার পাশাপাশি বিভিন্ন বিনোদনমূলক কার্যক্রম যেমনি শিক্ষার্থীদের মনোযোগী করে তোলে তেমনি
                                শিক্ষার্থীর বিভিন্ন রকম মানসিক বিকাশে সহায়তা করে।
                            </p>
                            <p>
                                শিক্ষাপ্রতিষ্ঠান এবং নির্ধারিত পাঠ্যপুস্তক এর বাইরে আরও বিশাল একটি জগত রয়েছে। আর সেই জগতের
                                সাথে পরিচিত করতে হলে পড়ালেখার পাশাপাশি শিক্ষার্থীদের বিভিন্ন রকম বিনোদন মূলক কার্যক্রমের
                                সুযোগ করে দিতে হবে। লেখাপড়ার পাশাপাশি বিনোদনের গুরুত্ব কতটুকু তা সংক্ষেপে বললে বলা যায়-
                            </p>

                            <p>
                                ১। খেলাধুলায় অংশগ্রহণ শিক্ষার্থীদের শারীরিক বিকাশে সহায়তা করে। এছাড়াও একতা, নেতৃত্ব,
                                নিয়মানুবর্তিতা ইত্যাদি সামাজিক মনোভাবের বিকাশ ঘটে।
                                <br>
                                ২। বিভিন্ন জায়গায় ঘুরে বেড়ানোর মাধ্যমে শিক্ষার্থীদের জ্ঞানের পরিধি বৃদ্ধি পাবে এবং
                                বিভিন্ন বিষয়ে জানার ইচ্ছা সৃষ্টি হবে।
                                <br>
                                ৩। সাহিত্য চর্চার মাধ্যমে শিক্ষার্থীর মননশীলতা ও সৌন্দর্যবোধ বৃদ্ধি পাবে।
                                <br>
                                ৪। সাংস্কৃতিক কার্যক্রমে অংশগ্রহণের মাধ্যমে শিক্ষার্থীদের সৃজনশীলতা বৃদ্ধি পাবে।
                                <br>
                                ৫। টেলিভিশন, সোশ্যাল মিডিয়া ইত্যাদি ব্যবহারের মাধ্যমে সমসাময়িক বিষয় সম্পর্কে
                                শিক্ষার্থীদের জ্ঞান ও দক্ষতা বৃদ্ধি পাবে।
                                <br>
                                ৬। অন্যান্য কার্যক্রম যেমন বাগান করা, পশুপালন ইত্যাদির মাধ্যমে শিক্ষার্থীদের মানবিকতা, দয়া
                                ও কর্মদক্ষতা বৃদ্ধি পাবে।
                            </p>

                            <p class=" mt-5">
                                অর্থাৎ পড়াশোনার পাশাপাশি বিভিন্ন বিনোদন মূলক কার্যক্রমে অংশ নিলে শিক্ষার্থীদের লেখাপড়ার
                                একঘেয়েমি দূর হয় এবং শরীর ও মনে প্রশান্তি আসে যা পরবর্তীতে পুর্নোদ্দমে পড়াশোনায় মনোনিবেশ
                                করার শক্তি হিসেবে কাজ করে। এতে তাদের জ্ঞান বাস্তবভিত্তিক হয়, হৃদয়ের খোরাক অর্জিত হয়, শরীর
                                ও মনে পরিবর্তন আসে এবং পড়ালেখার প্রতি আগ্রহ ও মনোযোগ সৃষ্টি হয়।
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
