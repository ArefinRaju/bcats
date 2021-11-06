@extends('layouts.frontend-master')
@section('title')
    ব্লগ | আমার স্টুডেন্ট
@endsection
@section('styles')
    <style>
        .blog-img img {
            height: 200px;
            width: 100%;
        }

    </style>
@endsection
@section('content')

    <div class="blog-area ptb-80 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post rounded">
                                <div class="blog-img">
                                    <a href="{{ route('blog.details2') }}">
                                        <img src="{{ asset('frontend/images/coaching-software.png') }}" alt="blog img" />
                                    </a>
                                    <div class="date">
                                        <i class="far fa-calendar-alt"></i> March 15, 2019
                                    </div>
                                </div>
                                <div class="blog-post-content">
                                    <h3>
                                        <a href="{{ route('blog.details2') }}">সফটওয়্যার কিভাবে সাহয্য করতে পারে...?</a>
                                    </h3>
                                    <span>by <a href="#">admin</a></span>
                                    <p>
                                        বর্তমান যুগ প্রযুক্তির যুগ । মানুষের বেডরুম থেকে শুরু করে মহাকাশ পর্যন্ত প্রত্যেকটি
                                        ক্ষেত্রে রয়েছে প্রযুক্তির ছোঁয়া
                                    </p>
                                    <a class="read-more-btn" href="{{ route('blog.details2') }}">Read More <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post rounded">
                                <div class="blog-img">
                                    <a href="{{ route('blog.details1') }}">
                                        <img src="{{ asset('frontend/images/coaching.png') }}" alt="blog img" />
                                    </a>
                                    <div class="date">
                                        <i class="far fa-calendar-alt"></i> March 15, 2019
                                    </div>
                                </div>
                                <div class="blog-post-content">
                                    <h3>
                                        <a href="{{ route('blog.details1') }}">কোচিং ম্যানেজমেন্ট এর গুরুত্ব...</a>
                                    </h3>
                                    <span>by <a href="#">admin</a></span>
                                    <p>
                                        যদি একজন সফল কোচিং সেন্টারের উদ্যোক্তা হতে চান তাহলে সবচেয়ে গুরুত্বপূর্ণ যে বিষয়টি
                                        সম্পর্কে আপনাকে জানতে হবে তা হল
                                    </p>
                                    <a class="read-more-btn" href="{{ route('blog.details1') }}">Read More <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post rounded">
                                <div class="blog-img">
                                    <a href="{{ route('blog.details') }}">
                                        <img src="{{ asset('frontend/images/teacher3.png') }}" alt="blog img" />
                                    </a>
                                    <div class="date">
                                        <i class="far fa-calendar-alt"></i> March 15, 2019
                                    </div>
                                </div>
                                <div class="blog-post-content">
                                    <h3>
                                        <a href="{{ route('blog.details') }}">একজন ভালো শিক্ষকের গুণাবলী</a>
                                    </h3>
                                    <span>by <a href="#">admin</a></span>
                                    <p>
                                        জন অ্যাডামস শিক্ষককে “Maker of Man” বলে অভিহিত করেছেন। তিনি আরো বলেছেন,” শিক্ষক হলেন
                                        জাতির
                                        আলোকবর্তিকাবাহি
                                    </p>
                                    <a class="read-more-btn" href="{{ route('blog.details') }}">Read More <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post rounded">
                                <div class="blog-img">
                                    <a href="{{ route('blog.details5') }}">
                                        <img src="{{ asset('frontend/images/student-study.png') }}" alt="blog img" />
                                    </a>
                                    <div class="date">
                                        <i class="far fa-calendar-alt"></i> August 10, 2021
                                    </div>
                                </div>
                                <div class="blog-post-content">
                                    <h3>
                                        <a href="{{ route('blog.details5') }}">কিভাবে পড়াশোনায় মনোযোগী
                                            করা যায় </a>
                                    </h3>
                                    <span>by <a href="#">admin</a></span>
                                    <p>
                                        শিক্ষার সাথে মনোযোগের গভীর সম্পর্ক রয়েছে । মনোযোগ ছাড়া কোন শিক্ষাই স্বার্থক হয়ে
                                        উঠতে পারে না। কিন্তু এই মনোযোগ টি আসলে কি?
                                    </p>
                                    <a class="read-more-btn" href="{{ route('blog.details5') }}">Read More <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post rounded">
                                <div class="blog-img">
                                    <a href="{{ route('blog.details4') }}">
                                        <img src="{{ asset('frontend/images/student-playing.png') }}" alt="blog img" />
                                    </a>
                                    <div class="date">
                                        <i class="far fa-calendar-alt"></i> August 21, 2021
                                    </div>
                                </div>
                                <div class="blog-post-content">
                                    <h3>
                                        <a href="{{ route('blog.details4') }}">পড়াশোনার পাশাপাশি বিনোদনের গুরুত্ব.</a>
                                    </h3>
                                    <span>by <a href="#">admin</a></span>
                                    <p>
                                        আজকাল বিনোদনের অন্যতম মাধ্যম হচ্ছে মোবাইল, সোশ্যাল মিডিয়া বা টেলিভিশন। এছাড়াও
                                        অনেকে খেলাধুলা, ঘুরে বেড়ান,
                                    </p>
                                    <a class="read-more-btn" href="{{ route('blog.details4') }}">Read More <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post rounded">
                                <div class="blog-img">
                                    <a href="{{ route('blog.details3') }}">
                                        <img src="{{ asset('frontend/images/weak-student1.png') }}" alt="blog img" />
                                    </a>
                                    <div class="date">
                                        <i class="far fa-calendar-alt"></i> September 05, 2021
                                    </div>
                                </div>
                                <div class="blog-post-content">
                                    <h3>
                                        <a href="{{ route('blog.details3') }}">দুর্বল ছাত্রীদের কিভাবে আগ্রহী করা যায়?</a>
                                    </h3>
                                    <span>by <a href="#">admin</a></span>
                                    <p>
                                        পৃথিবীর প্রত্যেকটা মানুষের মধ্যে যেমন শারীরিক ও চারিত্রিক ভিন্নতা রয়েছে, তেমনি মেধার দিক থেকেও সবাই সমান না।
                                    </p>
                                    <a class="read-more-btn" href="{{ route('blog.details3') }}">Read More <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
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
                                <a href="{{ route('blog.details') }}" class="thumb"><span role="img"
                                        class="fullimage cover">
                                        <img src="{{ asset('frontend/images/weak-student1.png') }}"
                                            alt="image" /></span></a>
                                <div class="info">
                                    <time datetime="2021-06-30">June 10, 2021</time>
                                    <h5 class="title usmall">
                                        <a href="{{ route('blog.details3') }}">দুর্বল ছাত্রীদের কিভাবে আগ্রহী করা যায় ?</a>
                                    </h5>
                                </div>
                                <div class="clear"></div>
                            </article>
                            <article class="item">
                                <a href="{{ route('blog.details') }}" class="thumb"><span role="img"
                                        class="fullimage cover">
                                        <img src="{{ asset('frontend/images/student-playing.png') }}" alt="image" /></span></a>
                                <div class="info">
                                    <time datetime="2021-06-30">June 21, 2021</time>
                                    <h5 class="title usmall">
                                        <a href="{{ route('blog.details4') }}">পড়াশোনার পাশাপাশি বিনোদনের গুরুত্ব.</a>
                                    </h5>
                                </div>
                                <div class="clear"></div>
                            </article>
                            <article class="item">
                                <a href="{{ route('blog.details') }}" class="thumb"><span role="img"
                                        class="fullimage cover">
                                        <img src="{{ asset('frontend/images/student-study.png') }}" alt="image" /> </span></a>
                                <div class="info">
                                    <time datetime="2021-06-30">June 30, 2021</time>
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
    </div>

@endsection
@section('scripts')
@endsection
