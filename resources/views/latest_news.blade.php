@extends('layouts.app')

@section('title', 'Latest News - School Website')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid py-5 page-header position-relative mb-5"
     style="background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url('{{ $headerBackgroundImage }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container py-5 text-center">
        <h1 class="display-2 text-white animated slideInDown mb-4">Latest News</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Latest News</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Latest News Cards Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            @forelse($latestNews as $index => $news)
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="{{ 0.1 + ($index * 0.2) }}s">
                    <div class="bg-light rounded overflow-hidden h-100">
                        @if($news->image)
                            <img class="img-fluid w-100" 
                                 src="{{ asset('img/news/' . $news->image) }}" 
                                 alt="{{ $news->title }}" 
                                 style="height: 250px; object-fit: cover;">
                        @else
                            <div class="bg-primary d-flex align-items-center justify-content-center" 
                                 style="height: 250px;">
                                <i class="fa fa-newspaper fa-3x text-white"></i>
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="mb-3">{{ $news->title }}</h3>
                            <small class="text-muted mb-3 d-block">
                                <i class="fa fa-calendar me-2"></i>{{ $news->formatted_date }}
                            </small>
                            <p class="mb-0">{{ $news->excerpt }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="bg-light rounded p-5">
                        <i class="fa fa-newspaper fa-3x text-muted mb-3"></i>
                        <h3 class="text-muted">No News Available</h3>
                        <p class="text-muted">Check back later for the latest school news and announcements.</p>
                    </div>
                </div>
            @endforelse
        </div>
        
        @if($latestNews->count() > 0)
            <div class="text-center mt-5">
                <p class="text-muted">Stay tuned for more updates and announcements from our school!</p>
            </div>
        @endif
    </div>
</div>
<!-- Latest News Cards End -->
@endsection