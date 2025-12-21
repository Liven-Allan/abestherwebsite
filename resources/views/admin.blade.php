@extends('layouts.app')

@section('title', 'Admin Dashboard - School Website')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid py-5 page-header position-relative mb-5"
     style="background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url('{{ $headerBackgroundImage }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container py-5 text-center">
        <h1 class="display-2 text-white animated slideInDown mb-4">Admin Dashboard</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Admin</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Admin Content Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bg-light rounded p-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="text-center mb-4">
                        <h2 class="mb-3">Welcome to Admin Dashboard</h2>
                        <p class="text-muted">Manage your school website content from here</p>
                    </div>
                    
                    <!-- Admin Menu Cards -->
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <div class="bg-white rounded p-4 text-center h-100 shadow-sm">
                                <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle mb-4" style="width: 80px; height: 80px;">
                                    <i class="fa fa-images fa-2x text-white"></i>
                                </div>
                                <h4 class="mb-3">Carousel Management</h4>
                                <p class="mb-4">Manage home page carousel slides, images, and content</p>
                                <a href="{{ route('admin.carousel.index') }}" class="btn btn-primary">
                                    <i class="fa fa-cog me-2"></i>Manage Carousel
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="bg-white rounded p-4 text-center h-100 shadow-sm">
                                <div class="d-inline-flex align-items-center justify-content-center bg-success rounded-circle mb-4" style="width: 80px; height: 80px;">
                                    <i class="fa fa-info-circle fa-2x text-white"></i>
                                </div>
                                <h4 class="mb-3">About Section</h4>
                                <p class="mb-4">Edit the "Welcome to Our School" section content and images</p>
                                <a href="{{ route('admin.about-section.edit') }}" class="btn btn-success">
                                    <i class="fa fa-edit me-2"></i>Edit About Section
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="bg-white rounded p-4 text-center h-100 shadow-sm">
                                <div class="d-inline-flex align-items-center justify-content-center bg-warning rounded-circle mb-4" style="width: 80px; height: 80px;">
                                    <i class="fa fa-star fa-2x text-white"></i>
                                </div>
                                <h4 class="mb-3">Core Pillars</h4>
                                <p class="mb-4">Manage the "Why Choose Us" core pillars section (Max: 4)</p>
                                <a href="{{ route('admin.core-pillar.index') }}" class="btn btn-warning">
                                    <i class="fa fa-cog me-2"></i>Manage Pillars
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="bg-white rounded p-4 text-center h-100 shadow-sm">
                                <div class="d-inline-flex align-items-center justify-content-center bg-info rounded-circle mb-4" style="width: 80px; height: 80px;">
                                    <i class="fa fa-dollar-sign fa-2x text-white"></i>
                                </div>
                                <h4 class="mb-3">Fee Structure</h4>
                                <p class="mb-4">Manage tuition fees and uniform fees images</p>
                                <a href="{{ route('admin.fee-structure.index') }}" class="btn btn-info">
                                    <i class="fa fa-cog me-2"></i>Manage Fees
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="bg-white rounded p-4 text-center h-100 shadow-sm">
                                <div class="d-inline-flex align-items-center justify-content-center bg-secondary rounded-circle mb-4" style="width: 80px; height: 80px;">
                                    <i class="fa fa-users fa-2x text-white"></i>
                                </div>
                                <h4 class="mb-3">Staff Management</h4>
                                <p class="mb-4">Manage staff members, their profiles and roles</p>
                                <a href="{{ route('admin.staff.index') }}" class="btn btn-secondary">
                                    <i class="fa fa-cog me-2"></i>Manage Staff
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="bg-white rounded p-4 text-center h-100 shadow-sm">
                                <div class="d-inline-flex align-items-center justify-content-center bg-info rounded-circle mb-4" style="width: 80px; height: 80px;">
                                    <i class="fa fa-newspaper fa-2x text-white"></i>
                                </div>
                                <h4 class="mb-3">Latest News</h4>
                                <p class="mb-4">Manage school news and announcements</p>
                                <a href="{{ route('admin.latest-news.index') }}" class="btn btn-info">
                                    <i class="fa fa-cog me-2"></i>Manage News
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="bg-white rounded p-4 text-center h-100 shadow-sm">
                                <div class="d-inline-flex align-items-center justify-content-center bg-warning rounded-circle mb-4" style="width: 80px; height: 80px;">
                                    <i class="fa fa-address-book fa-2x text-white"></i>
                                </div>
                                <h4 class="mb-3">Contact Information</h4>
                                <p class="mb-4">Manage school contact details and addresses</p>
                                <a href="{{ route('admin.contact-info.index') }}" class="btn btn-warning">
                                    <i class="fa fa-cog me-2"></i>Manage Contact
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="bg-white rounded p-4 text-center h-100 shadow-sm">
                                <div class="d-inline-flex align-items-center justify-content-center bg-dark rounded-circle mb-4" style="width: 80px; height: 80px;">
                                    <i class="fa fa-cogs fa-2x text-white"></i>
                                </div>
                                <h4 class="mb-3">Site Settings</h4>
                                <p class="mb-4">Manage school name, logo and social media links</p>
                                <a href="{{ route('admin.site-setting.edit') }}" class="btn btn-dark">
                                    <i class="fa fa-cog me-2"></i>Manage Settings
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="bg-white rounded p-4 text-center h-100 shadow-sm">
                                <div class="d-inline-flex align-items-center justify-content-center bg-purple rounded-circle mb-4" style="width: 80px; height: 80px; background-color: #6f42c1 !important;">
                                    <i class="fa fa-images fa-2x text-white"></i>
                                </div>
                                <h4 class="mb-3">Photo Gallery</h4>
                                <p class="mb-4">Manage school photos and gallery images</p>
                                <a href="{{ route('admin.photo-gallery.index') }}" class="btn" style="background-color: #6f42c1; color: white;">
                                    <i class="fa fa-cog me-2"></i>Manage Gallery
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-5">
                        <a href="{{ route('logout') }}" class="btn btn-danger">
                            <i class="fa fa-sign-out-alt me-2"></i>Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Admin Content End -->
@endsection