@extends('layouts.app')

@section('title', 'Add Carousel Slide - Admin')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid py-5 page-header position-relative mb-5">
    <div class="container py-5 text-center">
        <h1 class="display-2 text-white animated slideInDown mb-4">Add Carousel Slide</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.carousel.index') }}">Carousel</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Add Slide</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Add Carousel Form Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-light rounded p-5">
                    <h2 class="mb-4">Create New Carousel Slide</h2>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.carousel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="first_text" name="first_text" placeholder="First Text" value="{{ old('first_text') }}" required>
                                    <label for="first_text">First Text (Small text at top)</label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="second_text" name="second_text" placeholder="Second Text" value="{{ old('second_text') }}" required>
                                    <label for="second_text">Second Text (Main heading)</label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="third_text" name="third_text" placeholder="Third Text" style="height: 120px;" required>{{ old('third_text') }}</textarea>
                                    <label for="third_text">Third Text (Description)</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="sort_order" name="sort_order" placeholder="Sort Order" value="{{ old('sort_order', 1) }}" min="0" required>
                                    <label for="sort_order">Sort Order</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active (Show on website)
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <label for="background_image" class="form-label">Background Image</label>
                                <input type="file" class="form-control" id="background_image" name="background_image" accept="image/*" required>
                                <div class="form-text">Upload an image for the carousel background (JPEG, PNG, JPG, GIF - Max: 2MB)</div>
                            </div>
                            
                            <div class="col-12">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save me-2"></i>Create Slide
                                    </button>
                                    <a href="{{ route('admin.carousel.index') }}" class="btn btn-secondary">
                                        <i class="fa fa-times me-2"></i>Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Carousel Form End -->
@endsection