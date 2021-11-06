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
                            <img src="{{ asset('frontend/images/student-study.png') }}" alt="image" />
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
                            <h3>ছাত্র-ছাত্রীদের কিভাবে পড়াশোনায় মনোযোগী করা যায়
                            </h3>
                            <p>
                                শিক্ষার সাথে মনোযোগের গভীর সম্পর্ক রয়েছে । মনোযোগ ছাড়া কোন শিক্ষাই স্বার্থক হয়ে উঠতে পারে
                                না। কিন্তু এই মনোযোগ টি আসলে কি?
                                মনোযোগ ব্যক্তির একটি বিশেষ ধরনের মানসিক অবস্থা, যার মাধ্যমে সে অন্য সবকিছু থেকে মনকে সরিয়ে
                                এনে শুধু পছন্দসই বস্তুর উপর নিবদ্ধ করে।
                            </p>
                            <p>
                                মনোযোগ এর সবচেয়ে প্রয়োজনীয় শর্ত হলো আগ্রহ। কোন বিষয়ের প্রতি আগ্রহ থাকলেই সে বিষয়ের
                                প্রতি মনোযোগ আসে। আর মনোযোগ এলেই ইচ্ছা, অনুভূতি ও কর্মপ্রচেষ্টা সেদিকে কেন্দ্রীভূত হয়। তাই
                                পড়াশোনার প্রতি ছাত্র-ছাত্রীদের মনোযোগী করতে হলে প্রথমে পড়াশোনার প্রতি তাদের আগ্রহী করে
                                তুলতে হবে। আর এই কাজটা সবচেয়ে ভালো করতে পারে একজন শিক্ষক। এছাড়াও অভিভাবকের এখানে
                                গুরুত্বপূর্ণ ভূমিকা রয়েছে।
                            </p>
                            <p class=" mt-5">
                                শিক্ষকের করণীয়-
                            </p>

                            <p>
                                ১। কোন কিছু পড়ানোর সময় পূর্ববর্তী কোন পড়া বা অভিজ্ঞতার সাথে মিল রেখে পড়ানো উচিত।
                                <br>
                                ২। শিক্ষক কেন্দ্রিক পাঠ দান না করে অংশগ্রহণমূলক পদ্ধতিতে পাঠদান করতে হবে।
                                <br>
                                ৩। বিষয়বস্তুর সাথে মিল রেখে বিভিন্ন বস্তুর উদাহরণ দিতে হবে।
                                <br>
                                ৪। বিষয়বস্তুর সাথে মিল রেখে আকর্ষণীয় শিক্ষা উপকরণ ব্যবহার করতে হবে।
                                <br>
                                ৫। শিক্ষককে স্পষ্ট উচ্চারণ ও সাবলীল ভাষায় ছাত্র-ছাত্রীদের পড়া বুঝাতে হবে।
                                <br>
                                ৬। বারবার ছোট ছোট প্রশ্ন ও মূল্যায়নের মাধ্যমে ছাত্র-ছাত্রীদের পড়াশুনার সাথে সম্পৃক্ত রাখতে
                                হবে।
                                <br>
                                ৭। ছাত্র-ছাত্রীর কোন বিষয়ে সমস্যা হচ্ছে কিনা তা লক্ষ্য রাখতে হবে এবং প্রয়োজনে সাহায্য করতে
                                হবে।
                                <br>
                                ৮। ছাত্র-ছাত্রীর কোন শারীরিক সমস্যা আছে কিনা তাও খেয়াল রাখতে হবে।
                                <br>
                                ৯। কোন বিষয়ে ব্যর্থ হলে তিরস্কার না করে পুনরায় চেষ্টায় প্রতি উৎসাহিত করতে হবে।
                                <br>
                                ১০। দুর্বল ছাত্র-ছাত্রীদের প্রতি বিশেষ যত্নশীল হতে হবে।
                                <br>
                                ১১। কোন বিষয়ে সফল হলে এবং মনোযোগী আচরণের জন্য বারবার তার প্রশংসা করতে হবে।
                                <br>
                                ১২। সবচেয়ে গুরুত্বপূর্ণ বিষয় , একবারে ছাত্র-ছাত্রীকে ধারণ ক্ষমতার বেশি পড়ার চাপ দেয়া যাবে
                                না।
                            </p>

                            <p class=" mt-5">
                                অভিভাবকের করণীয়-
                            </p>
                            <p>
                                ১। বাড়িতে শিক্ষাবান্ধব পরিবেশের ব্যবস্থা করে দিতে হবে।
                                <br>
                                ২। বিভিন্ন রকম সফলতায় ছোট ছোট পুরস্কারের ব্যবস্থা করতে হবে এবং প্রশংসা করতে হবে।
                                <br>
                                ৩। পড়াশোনার পাশাপাশি খেলাধুলা ও বিনোদনের সুযোগ দিতে হবে।
                                <br>
                                ৪। শিক্ষার্থীর স্বাস্থ্যকর খাবার এবং শারীরিক ও মানসিক সুস্থতার প্রতি যত্নশীল হতে হবে।
                                <br>
                                ৫। একবারে অনেক বেশি চাপ না দিয়ে শিক্ষার্থীর ধারণ ক্ষমতা অনুযায়ী মাঝে মাঝে বিরতি দিয়ে
                                পড়ার সুযোগ দেয়া উচিত।
                                <br>
                                ৬। পড়াশোনায় মনোযোগ নষ্ট করতে পারে এমন সব উপকরণ আশেপাশে যাতে না থাকে সেদিকে লক্ষ রাখতে হবে।
                                <br>
                            <p class=" mt-5">
                                পৃথিবীর সব মানুষ যেমন সমান হয় না তেমনি সব ছাত্রছাত্রী ও পড়াশোনায় সমান মনোযোগী হয় না।
                                দুর্বল ছাত্র-ছাত্রীদের তিরস্কার না করে সব সময় তাদের প্রতি বিশেষ যত্নশীল হতে হবে। মনে রাখতে
                                হবে আগ্রহ যেমন মনোযোগ এর প্রধান শর্ত তেমনি বারবার তিরস্কার করা ও মনোযোগ নষ্ট করার প্রধান
                                কারণ ।
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
