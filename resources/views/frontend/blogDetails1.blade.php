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
                            <img src="{{ asset('frontend/images/coaching.png') }}" alt="image" />
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
                            <h3>কোচিং ম্যানেজমেন্ট এর গুরুত্ব...</h3>
                            <p>
                                যদি একজন সফল কোচিং সেন্টারের উদ্যোক্তা হতে চান তাহলে সবচেয়ে গুরুত্বপূর্ণ যে বিষয়টি
                                সম্পর্কে আপনাকে জানতে হবে তা হল “ কোচিং ম্যানেজমেন্ট “ । শুধু নতুনদের জন্য নয় বর্তমানে
                                কোচিং সেন্টারের পরিচালক আছেন যারা তাদেরও এ বিষয়ে খুব ভালো ধারণা না থাকলে সফল হতে পারবেন না
                                । প্রথমেই বলব এই “ কোচিং ম্যানেজমেন্ট “ কি? কোচিং ম্যানেজমেন্ট এমন একটি প্রক্রিয়া যেখানে
                                কোচিং সেন্টারের ভিতরের কার্যক্রমগুলো বিভিন্ন ধরনের মানুষের দ্বারা সম্মিলিতভাবে সংগঠিত হয় ।
                                অর্থাৎ কোন ব্যক্তি ইচ্ছে করে একা একা একটি কোচিং সেন্টার পরিচালনা করতে পারবেনা । এখানে শিক্ষক
                                থাকে, ছাত্র-ছাত্রী থাকে , অভিভাবক থাকে এমনকি প্রতিষ্ঠান এর পিয়ন দারোয়ানদের কথাও ভুলে গেলে
                                চলবে না । আর এইসব মানুষ সম্মিলিত ভাবে যে কাজগুলো করে থাকে তা হল - ভর্তি, হাজিরা, সময়
                                নিয়ন্ত্রণ , মনিটরিং , ক্লাস , পরীক্ষা , বেতন ইত্যাদি । একটি কোচিং সেন্টার কে সঠিকভাবে
                                পরিচালনার জন্য একটি কার্যকর মানেজমেন্ট পলিসি খুবই জরুরি । আর এজন্য আপনাকে যে সব বিষয়ে
                                সবচেয়ে বেশি খেয়াল রাখতে হবে তা হচ্ছে –
                            </p>
                            <p>
                                ১ । পরিকল্পনাঃ সঠিকভাবে পরিকল্পনা গ্রহণ কোচিং ম্যানেজমেন্টের সবচেয়ে গুরুত্বপূর্ণ কাজ।
                                যেকোনো বিষয়ে পরিকল্পনার সময় অবশ্যই ভেবেচিন্তে সময় উপযোগী পরিকল্পনা করতে হবে ।
                                <br>
                                ২ । বাস্তবায়নঃ পরিকল্পনা গ্রহণের পর তা সঠিকভাবে এবং সময়মতো বাস্তবায়ন হচ্ছে কিনা সেটাও
                                খুবই গুরুত্বপূর্ণ ।<br>
                                ৩ । শিক্ষার মানঃ একটি কোচিং সেন্টারে মূল কাজ হচ্ছে শিক্ষার্থীকে শিক্ষা ক্ষেত্রে সাহায্য করা
                                । সে ক্ষেত্রে শিক্ষার যথাযথ মান নিশ্চিত করা কোচিং ম্যানেজমেন্টের একটি গুরুত্বপূর্ণ দায়িত্ব
                                ।
                                <br>
                                ৪। মনিটরিংঃ পরিকল্পনা বাস্তবায়নে এবং শিক্ষার যথাযথ মান নিশ্চিত করণে প্রতিষ্ঠানের সকল
                                কর্মীদের কাজের প্রতি অবশ্যই সব সময় মনিটরিং করতে হবে । আর এটা কোচিং ম্যানেজমেন্ট এর
                                অন্তর্ভুক্ত ।
                                <br>
                                ৫ । তথ্য সংরক্ষণঃ শিক্ষার্থী, শিক্ষক , অন্যান্য কর্মচারী এবং প্রতিষ্ঠানের সাথে সম্পর্কিত
                                ছোট-বড় প্রত্যেকটা বিষয়ে তথ্য সংরক্ষণ করে রাখা কোচিং ম্যানেজমেন্টের একটি গুরুত্বপূর্ণ
                                দায়িত্ব । কারণ এটি প্রতিষ্ঠান পরিচালনায় খুবই গুরুত্বপূর্ণ ভূমিকা রাখে ।
                                <br>
                                ৬। সময় উপযোগীঃ কোচিং ম্যানেজমেন্ট এর সবচেয়ে গুরুত্বপূর্ণ বিষয় হচ্ছে সময় উপযোগী হওয়া ।
                                কোচিং ম্যানেজমেন্ট প্রক্রিয়াটি এবং সম্পূর্ণ কোচিং সিস্টেমটি অবশ্যই যুগ উপযোগী হতে হবে ।কারণ
                                বর্তমান যুগ প্রযুক্তির যুগ । যুগের সাথে তাল মিলিয়ে পুরাতন ম্যানুয়াল সিস্টেমে পড়ে থাকলে
                                সফল হওয়া যাবেনা । তাই ক্লাস রুম থেকে শুরু করে ম্যানেজমেন্ট সিস্টেম পর্যন্ত প্রত্যেকটা
                                ক্ষেত্রে থাকতে হবে প্রযুক্তির ছোঁয়া।
                                <br>
                                ৭। কর্মীদের সন্তুষ্টিঃ কোচিং সেন্টারে সঠিকভাবে পরিচালনার জন্য প্রতিষ্ঠানের কর্মীদের
                                সন্তুষ্টি খুবই জরুরী । তাই কোচিং ম্যানেজমেন্ট এর ভেতর এই বিষয়টিকে অবশ্যই অন্তর্ভুক্ত রাখতে
                                হবে।
                                <br>
                                ৮। অভিভাবকদের সাথে সম্পর্কঃ সবশেষে আরেকটি গুরুত্বপূর্ণ বিষয় হচ্ছে অভিভাবকদের সাথে নিয়মিত
                                মিটিং এর মাধ্যমে ভালো একটা যোগাযোগ স্থাপন করাও কোচিং ম্যানেজমেন্ট এর ভিতরে পড়ে।
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
