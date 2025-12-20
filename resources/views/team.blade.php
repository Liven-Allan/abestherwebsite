@extends('layouts.app')

@section('title', 'Team - School Website')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid py-5 page-header position-relative mb-5"
     style="background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url('{{ $headerBackgroundImage }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container py-5 text-center">
        <h1 class="display-4 text-primary animated slideInDown mb-3">Staff</h1>
        <h2 class="display-2 text-white animated slideInDown">Our Members Of Staff</h2>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Teachers</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Team Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Our Team</h1>
            <p>Meet our dedicated team of professional educators</p>
        </div>
        <div class="row g-4">
            @forelse($staff as $index => $member)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 + ($index * 0.2) }}s">
                <div class="bg-light rounded p-4 text-center h-100">
                    <div class="mb-4">
                        <img class="img-fluid rounded-circle" src="{{ asset($member->profile_picture) }}" alt="{{ $member->full_name }}" style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <h4 class="mb-2">{{ $member->full_name }}</h4>
                    <p class="text-muted mb-0">{{ $member->role }}</p>
                </div>
            </div>
            @empty
            <!-- Fallback if no staff members exist -->
            <div class="col-12 text-center">
                <p class="text-muted">No staff members available at the moment.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- Team End -->
@endsection