@extends('layouts.app')

@section('title', 'Home - School Website')
@section('description', 'Welcome to our school website')

@section('content')
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">
        @forelse($carousels as $carousel)
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid w-100" src="{{ asset($carousel->background_image) }}" alt="{{ $carousel->first_text }}" style="height: 600px; object-fit: cover;">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">{{ $carousel->first_text }}</h5>
                            <h1 class="display-3 text-white animated slideInDown">{{ $carousel->second_text }}</h1>
                            <p class="fs-5 text-white mb-4 pb-2">{{ $carousel->third_text }}</p>
                            <a href="{{ route('about') }}" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Learn More</a>
                            <a href="{{ route('fees-structure') }}" class="btn btn-light rounded-pill py-sm-3 px-sm-5 animated slideInRight">Our Classes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <!-- Fallback slide if no carousel data exists -->
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid w-100" src="{{ asset('img/carousel-1.jpg') }}" alt="School" style="height: 600px; object-fit: cover;">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Welcome</h5>
                            <h1 class="display-3 text-white animated slideInDown">Abesther Primary School</h1>
                            <p class="fs-5 text-white mb-4 pb-2">Quality education for your child's bright future.</p>
                            <a href="{{ route('about') }}" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Learn More</a>
                            <a href="{{ route('fees-structure') }}" class="btn btn-light rounded-pill py-sm-3 px-sm-5 animated slideInRight">Our Classes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>
<!-- Carousel End -->



<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">----- WELCOME TO OUR SCHOOL</h5>
                <h1 class="mb-4">{{ $aboutSection->title }}</h1>
                <div class="mb-4">{!! $aboutSection->formatted_description !!}</div>
                <div class="row g-4 align-items-center">
                    <div class="col-sm-6">
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('about') }}">Read More</a>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                <div class="row">
                    <div class="col-12 text-center">
                        <img class="img-fluid w-75 rounded-circle bg-light p-3" src="{{ asset($aboutSection->image_1) }}" alt="{{ $aboutSection->title }}">
                    </div>
                    <div class="col-6 text-start" style="margin-top: -150px;">
                        <img class="img-fluid w-100 rounded-circle bg-light p-3" src="{{ asset($aboutSection->image_2) }}" alt="{{ $aboutSection->title }}">
                    </div>
                    <div class="col-6 text-end" style="margin-top: -150px;">
                        <img class="img-fluid w-100 rounded-circle bg-light p-3" src="{{ asset($aboutSection->image_3) }}" alt="{{ $aboutSection->title }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Why Choose Us Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h5 class="text-primary text-uppercase mb-3">----- WHY CHOOSE US -----</h5>
            <h1 class="mb-3">Our Core Pillars of Excellence</h1>
            <p>We believe in providing a well-rounded education that prepares students for success in all aspects of life.</p>
        </div>
        <div class="row g-4">
            @forelse($corePillars as $index => $pillar)
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="{{ 0.1 + ($index * 0.2) }}s">
                <div class="bg-light rounded p-4 text-center h-100">
                    <div class="d-inline-flex align-items-center justify-content-center {{ $pillar->icon_color }} rounded-circle mb-4" style="width: 80px; height: 80px;">
                        <i class="fa {{ $pillar->icon }} fa-2x text-white"></i>
                    </div>
                    <h4 class="mb-3">{{ $pillar->title }}</h4>
                    <p class="mb-0">{{ $pillar->description }}</p>
                </div>
            </div>
            @empty
            <!-- Fallback if no pillars exist -->
            <div class="col-12 text-center">
                <p class="text-muted">No core pillars available at the moment.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- Why Choose Us End -->

<!-- School Updates Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-start mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="text-primary text-uppercase mb-3">----- SCHOOL UPDATES</h5>
            <h1 class="mb-3">LATEST NEWS AND EVENTS</h1>
        </div>
        @if($latestNews->count() > 0)
            <div class="row g-4">
                <!-- Main Featured Card -->
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    @php $featuredNews = $latestNews->first(); @endphp
                    <div class="bg-light rounded overflow-hidden h-100">
                        @if($featuredNews->image)
                            <img class="img-fluid w-100" 
                                 src="{{ asset('img/news/' . $featuredNews->image) }}" 
                                 alt="{{ $featuredNews->title }}" 
                                 style="height: 300px; object-fit: cover;">
                        @else
                            <div class="bg-primary d-flex align-items-center justify-content-center" 
                                 style="height: 300px;">
                                <i class="fa fa-newspaper fa-3x text-white"></i>
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="mb-3">{{ $featuredNews->title }}</h3>
                            <p class="mb-3">{{ $featuredNews->excerpt }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="fa fa-calendar me-2"></i>{{ $featuredNews->formatted_date }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Side Cards -->
                <div class="col-lg-4">
                    @foreach($latestNews->skip(1)->take(2) as $index => $news)
                        <div class="bg-light rounded p-4 mb-4 wow fadeInUp" 
                             data-wow-delay="{{ 0.3 + ($index * 0.2) }}s">
                            <h5 class="mb-3">{{ $news->title }}</h5>
                            <p class="mb-3">{{ Str::limit(strip_tags($news->content), 100) }}</p>
                            <small class="text-muted">
                                <i class="fa fa-calendar me-2"></i>{{ $news->formatted_date }}
                            </small>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <!-- View All News Button -->
            <div class="text-center mt-4 wow fadeInUp" data-wow-delay="0.7s">
                <a href="{{ route('latest-news') }}" class="btn btn-primary py-3 px-5">
                    View All News <i class="fa fa-arrow-right ms-2"></i>
                </a>
            </div>
        @else
            <div class="text-center">
                <div class="bg-light rounded p-5">
                    <i class="fa fa-newspaper fa-3x text-muted mb-3"></i>
                    <h3 class="text-muted">No News Available</h3>
                    <p class="text-muted">Check back later for the latest school news and announcements.</p>
                </div>
            </div>
        @endif
    </div>
</div>
<!-- School Updates End -->

@endsection