@extends('web.layout')
@section('content')
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="{{ route('web.home.index') }}">DarkMoon</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/imgs/logo.png" alt="" class="img-fluid"></a>-->

            @yield('nav', View::make('web.nav', compact('Blogs', 'services', 'lang', 'Projects', 'Members')))

        </div>
    </header><!-- End Header -->

    <!-- ======= space Section ======= -->
    <div id="space" class="space route bg-image" style="background-image: url(assets/imgs/spacedev-img.jpg)">
        <div class="overlay-itro"></div>
        <div class="space-content display-table">
            <div class="table-cell">
                <div class="container">
                    <!--<p class="display-6 color-d">Hello, world!</p>-->
                    {{-- <h1 class="space-title mb-4">{{ trans('Home.title') }}</h1> --}}
                    <h1 class="space-title mb-4">We Are <span class="spacedev"> DarkMoon </span></h1>
                    <p class="space-subtitle"><span class="typed" data-typed-items="{{ trans('Home.Job_Data') }}"></span>
                    </p>
                    {{-- <p class="space-subtitle"><span class="typed" data-typed-items=""></span></p> --}}
                    <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
                </div>
            </div>
        </div>
    </div><!-- End space Section -->

    <main id="main">

        <!-- ======= Services Section ======= -->
        <!-- @if (!$services->isEmpty())
    -->
        <section id="services" class="services-mf pt-5 route bg-dark  ">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box text-center">
                            <h3 class="title-a text-light">
                                {{ trans('Home.Services') }}
                            </h3>
                            <p class="subtitle-a text-light">
                                About what we offer
                            </p>
                            <div class="line-mf"></div>
                        </div>
                    </div>
                </div>
                <div class="row  d-flex justify-content-center">

                    @foreach ($services as $Data)
                        <form action="{{ route('web.home.sub_services', $Data->id) }}" class="col-md-4 "method="GET">
                            <div>
                                <div class="service-box"
                                    @if ($Data->cover_image) style="background-color:gray;" @endif>
                                    <div class="service-ico">
                                        <button class="ico-circle">
                                            @if ($Data->image)
                                                <img src="{{ asset($Data->image) }}"
                                                    style="width: 80px;height:80px;border-radius: 100%;" alt="">
                                            @else
                                                <i class="bi bi-calendar4-week"></i>
                                            @endif
                                        </button>
                                    </div>
                                    <div class="service-content">
                                        <h2 class="s-title text-light">{{ $Data->name }}</h2>
                                        <p class="s-description text-center text-light">
                                            {{ $Data->detail }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
        </section><!-- End Services Section -->
        <!--
    @endif -->
        <!-- ======= Counter Section ======= -->
        <div class="section-counter paralax-mf bg-image" style="background-image: url(assets/imgs/counters-bg.jpg)">
            <div class="overlay-mf"></div>
            <div class="container position-relative">
                <div class="row">
                    <div class="col-sm-3 col-lg-3">
                        <div class="counter-box counter-box pt-4 pt-md-0">
                            <div class="counter-ico">
                                <span class="ico-circle"><i class="bi bi-check"></i></span>
                            </div>
                            <div class="counter-num">
                                <p data-purecounter-start="0" data-purecounter-end="450" data-purecounter-duration="10"
                                    class="counter purecounter"></p>
                                <span class="counter-text">WORKS COMPLETED</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <div class="counter-box pt-4 pt-md-0">
                            <div class="counter-ico">
                                <span class="ico-circle"><i class="bi bi-journal-richtext"></i></span>
                            </div>
                            <div class="counter-num">
                                <p data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="10"
                                    class="counter purecounter"></p>
                                <span class="counter-text">YEARS OF EXPERIENCE</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <div class="counter-box pt-4 pt-md-0">
                            <div class="counter-ico">
                                <span class="ico-circle"><i class="bi bi-people"></i></span>
                            </div>
                            <div class="counter-num">
                                <p data-purecounter-start="0" data-purecounter-end="550" data-purecounter-duration="10"
                                    class="counter purecounter"></p>
                                <span class="counter-text">TOTAL CLIENTS</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <div class="counter-box pt-4 pt-md-0">
                            <div class="counter-ico">
                                <span class="ico-circle"><i class="bi bi-award"></i></span>
                            </div>
                            <div class="counter-num">
                                <p data-purecounter-start="0" data-purecounter-end="48" data-purecounter-duration="8"
                                    class="counter purecounter"></p>
                                <span class="counter-text">AWARD WON</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Counter Section -->

        <!-- ======= Portfolio Section ======= -->
        @if (!$Projects->isEmpty())
            <section id="work" class="portfolio-mf sect-pt4 route bg-dark">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="title-box text-center">
                                <h3 class="title-a text-light">
                                    {{ trans('Home.Projects') }}
                                </h3>
                                <p class="subtitle-a text-light">
                                    this project that we have creat it
                                </p>
                                <div class="line-mf"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center ">
                        @foreach ($Projects as $Project)
                            <div class="col-md-4 rounded-3">
                                <div class="work-box  rounded-3">
                                    <a href="{{ asset($Project->image) }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox">
                                        <div class="work-img">
                                            <img src="{{ asset($Project->image) }}" width="100%" alt=""
                                                class="img-fluid rounded-top">
                                        </div>
                                    </a>
                                    <div  class="work-content rounded-3">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <h2 class="w-title">{{ $Project->name }}</h2>
                                                <div class="w-more">
                                                    <span class="w-ctegory">Web Design</span> / <span
                                                        class="w-date">{{ $Project->from_date }}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="w-like">
                                                    <a href="{{ url($Project->url) }}"> <span
                                                            class="bi bi-plus-circle"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>
        @endif
        <!-- ======= Testimonials Section ======= -->
        <div id="Members" class="testimonials paralax-mf bg-image"
            style="background-image: url(assets/imgs/overlay-bg.jpg)">
            <div class="overlay-mf"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="
                @if ($Members_count > 1) testimonials-slider @endif
                swiper"
                            data-aos="fade-up" data-aos-delay="100">
                            <div class="swiper-wrapper">
                                @foreach ($Members as $Member)
                                    <div class="swiper-slide">
                                        <div class="testimonial-box">
                                            <div class="d-flex justify-content-center align-items-center ">
                                                <div>
                                                    <img src="{{ $Member->image ? asset($Member->image) : asset('assets/plugins/font-awesome/advanced-options/raw-svg/solid/user-circle.svg') }}"
                                                        style="width: 150px;height: 150px;" alt="photo"
                                                        class="rounded-circle b-shadow-a">
                                                </div>

                                                <div class="ms-3 d-flex flex-column">
                                                    <div class="d-flex">

                                                        <h4 class="fw-bold" style="letter-spacing: 2px">
                                                            <span class="badge bg-success">{{ $Member->name }}</span>
                                                        </h4>

                                                        <h5
                                                            class="d-flex mx-1 justify-content-center align-items-end fw-bold">
                                                            <span class="fw-bold badge bg-primary"
                                                                style="letter-spacing: 1.2px">
                                                                {{ $Member->team->name_team }}
                                                            </span>
                                                            <span class="bg-dark mx-1 text-light badge">$>
                                                                {{ $Member->position }}</span>
                                                        </h5>

                                                    </div>

                                                    <div class="w-100 text-start ml-2">
                                                        <p class="fw-bold d-flex">{{ $description }}</p>
                                                    </div>
                                                </div>
                                            </div>Member
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div><!-- End Testimonials Section -->
                <!-- ======= Blog Section ======= -->
                @if (!$Blogs->isEmpty())
                    <section id="blog" class="blog-mf sect-pt4 route">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="title-box text-center">
                                        <h3 class="title-a">
                                            {{ trans('Home.Blogs') }}
                                        </h3>
                                        <p class="subtitle-a">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        </p>
                                        <div class="line-mf"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{-- ///////// --}}
                                @foreach ($Blogs as $blog)
                                    {{-- {{ dd($blog->image); }} --}}
                                    <div class="col-md-4">
                                        <div class="card card-blog">
                                            <div class="card-img">
                                                <img src="{{ asset($blog->image) }}" alt=""
                                                    style="height: 18rem" class="img-fluid w-100 rounded-top">
                                            </div>
                                            <div class="card-body">
                                                <div class="card-category-box">
                                                    {{-- <div class="card-category">
                                <h6 class="category">Travel</h6>
                            </div> --}}
                                                </div>
                                                <h3 class="card-title">{{ $blog->title }}</h3>
                                                <p class="card-description">{{ $blog->detail }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ///////// --}}
                                @endforeach

                            </div>
                    </section><!-- End Blog Section -->
                @endif

                <!-- ======= Contact Section ======= -->
                @if ($Blogs->isEmpty())
                    <section id="contact" class="paralax-mf footer-paralax bg-image route"
                        style="background-image: url(assets/imgs/overlay-bg.jpg)">
                    @else
                        <section id="contact" class="paralax-mf footer-paralax bg-image sect-mt4 route"
                            style="background-image: url(assets/imgs/overlay-bg.jpg)">
                @endif
                <div class="overlay-mf"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="contact-mf">
                                <div id="contact" class="box-shadow-full">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="title-box-2">
                                                <h5 class="title-left">
                                                    {{ trans('Home.Send Message Us') }}
                                                </h5>
                                            </div>
                                            <div>
                                                <form action="{{ route('web.home.store') }}" class="php-email-form"
                                                    method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <div class="form-group">
                                                                <input type="text" name="name"
                                                                    class="form-control rounded
                                        @if ($lang == 'ar') text-end @endif
                                        "
                                                                    id="name"
                                                                    placeholder="{{ trans('Home.Your Name') }}"
                                                                    autocomplete="off" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <div class="form-group">
                                                                <input type="email"
                                                                    class="form-control rounded
                                        @if ($lang == 'ar') text-end @endif
                                        "
                                                                    name="email" id="email"
                                                                    placeholder="{{ trans('Home.Your Email') }}"
                                                                    autocomplete="off" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <div class="form-group">
                                                                <input type="text"
                                                                    class="form-control rounded
                                        @if ($lang == 'ar') text-end @endif
                                        "
                                                                    name="phone" id="phone"
                                                                    placeholder="{{ trans('Home.Phone') }}"
                                                                    autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <div class="form-group">
                                                                <input type="text"
                                                                    class="form-control rounded
                                        @if ($lang == 'ar') text-end @endif
                                        "
                                                                    name="subject" id="subject"
                                                                    placeholder="{{ trans('Home.Subject') }}"
                                                                    autocomplete="off" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <textarea
                                                                    class="form-control rounded
                                        @if ($lang == 'ar') text-end @endif
                                        "
                                                                    name="message" rows="5" placeholder="{{ trans('Home.Message') }}" autocomplete="off" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="container my-1">
                                                            <div class="loading"></div>
                                                            <div class="alert error-message"></div>
                                                            <div class="alert sent-message">"</div>
                                                        </div>
                                                        <div class="col-md-12 mt-2 text-center">
                                                            <button type="submit"
                                                                class="button button-a button-big button-rouded">{{ trans('Home.Send Message') }}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="title-box-2 pt-4 pt-md-0">
                                                <h5 class="title-left">
                                                    {{ trans('Home.Get in Touch') }}
                                                </h5>
                                            </div>
                                            <div class="more-info">
                                                <p class="lead">
                                                    about us
                                                </p>
                                                <ul class="list-ico">
                                                    <li><span class="bi bi-geo-alt"></span>Cairo, egypt
                                                    </li>
                                                    <li><span class="bi bi-phone"></span>+201069696038</li>
                                                    <li><span class="bi bi-envelope"></span>https://dark-moon.ga
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="socials" style="transform: translateY(-10px)">
                                                <ul>
                                                    <li><a href=""><span
                                                                class="ico-circle d-flex align-items-center justify-content-center"><i
                                                                    class="bi bi-facebook"></i></span></a></li>
                                                    <li><a href=""><span
                                                                class="ico-circle d-flex align-items-center justify-content-center"><i
                                                                    class="bi bi-instagram"></i></span></a></li>
                                                    <li><a href=""><span
                                                                class="ico-circle d-flex align-items-center justify-content-center"><i
                                                                    class="bi bi-twitter"></i></span></a></li>
                                                    <li><a href=""><span
                                                                class="ico-circle d-flex align-items-center justify-content-center"><i
                                                                    class="bi bi-linkedin"></i></span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section><!-- End Contact Section -->
    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="copyright-box">
                        <p class="copyright">&copy; Copyright <strong class="spacedev">DarkMoon</strong>. All Rights
                            Reserved</p>
                        <div class="credits">
                            Designed by <a href="https://dark-moon.ga/"><span
                                    class="spacedev">Monospace</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

@endsection
