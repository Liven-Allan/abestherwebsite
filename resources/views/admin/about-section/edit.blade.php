@extends('layouts.app')

@section('title', 'Edit About Section - Admin')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid py-5 page-header position-relative mb-5">
    <div class="container py-5 text-center">
        <h1 class="display-2 text-white animated slideInDown mb-4">Edit About Section</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">About Section</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Edit About Section Form Start -->
<div class="container-xxl py-5">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="bg-light rounded p-5">
                    <h2 class="mb-4">Edit "Welcome to Our School" Section</h2>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.about-section.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title', $aboutSection->title) }}" required>
                                    <label for="title">Section Title</label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="8" placeholder="Enter description with line breaks..." required>{{ old('description', $aboutSection->description) }}</textarea>
                                <div class="form-text">Use line breaks to separate paragraphs. They will be preserved on the website.</div>
                            </div>
                            
                            <!-- Image 1 -->
                            <div class="col-md-4">
                                <label for="image_1" class="form-label">Image 1 (Main Center Image)</label>
                                <input type="file" class="form-control" id="image_1" name="image_1" accept="image/*">
                                <div class="form-text">Leave empty to keep current image</div>
                                
                                @if($aboutSection->image_1)
                                    <div class="mt-3">
                                        <p class="mb-2">Current Image:</p>
                                        <img src="{{ asset($aboutSection->image_1) }}" alt="Current image 1" class="img-thumbnail" style="max-width: 150px;">
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Image 2 -->
                            <div class="col-md-4">
                                <label for="image_2" class="form-label">Image 2 (Bottom Left)</label>
                                <input type="file" class="form-control" id="image_2" name="image_2" accept="image/*">
                                <div class="form-text">Leave empty to keep current image</div>
                                
                                @if($aboutSection->image_2)
                                    <div class="mt-3">
                                        <p class="mb-2">Current Image:</p>
                                        <img src="{{ asset($aboutSection->image_2) }}" alt="Current image 2" class="img-thumbnail" style="max-width: 150px;">
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Image 3 -->
                            <div class="col-md-4">
                                <label for="image_3" class="form-label">Image 3 (Bottom Right)</label>
                                <input type="file" class="form-control" id="image_3" name="image_3" accept="image/*">
                                <div class="form-text">Leave empty to keep current image</div>
                                
                                @if($aboutSection->image_3)
                                    <div class="mt-3">
                                        <p class="mb-2">Current Image:</p>
                                        <img src="{{ asset($aboutSection->image_3) }}" alt="Current image 3" class="img-thumbnail" style="max-width: 150px;">
                                    </div>
                                @endif
                            </div>
                            
                            <div class="col-12">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save me-2"></i>Update About Section
                                    </button>
                                    <a href="{{ route('admin') }}" class="btn btn-secondary">
                                        <i class="fa fa-arrow-left me-2"></i>Back to Dashboard
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
<!-- Edit About Section Form End -->
@endsection