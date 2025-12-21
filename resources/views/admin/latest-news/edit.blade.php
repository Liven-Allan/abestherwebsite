@extends('layouts.app')

@section('title', 'Edit News')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid py-5 page-header position-relative mb-5"
     style="background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url('{{ $headerBackgroundImage }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container py-5 text-center">
        <h1 class="display-2 text-white animated slideInDown mb-4">Edit News Article</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.latest-news.index') }}">Latest News</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit News Item</h5>
                    <a href="{{ route('admin.latest-news.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.latest-news.update', $latestNews) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('title') is-invalid @enderror" 
                                           id="title" 
                                           name="title" 
                                           value="{{ old('title', $latestNews->title) }}" 
                                           required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" 
                                              id="content" 
                                              name="content" 
                                              rows="8" 
                                              required>{{ old('content', $latestNews->content) }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label">News Image</label>
                                    @if($latestNews->image)
                                        <div class="mb-2">
                                            <img src="{{ asset('img/news/' . $latestNews->image) }}" 
                                                 alt="{{ $latestNews->title }}" 
                                                 class="img-thumbnail d-block" 
                                                 style="max-width: 200px; max-height: 150px; object-fit: cover;">
                                            <small class="text-muted">Current image</small>
                                        </div>
                                    @endif
                                    <input type="file" 
                                           class="form-control @error('image') is-invalid @enderror" 
                                           id="image" 
                                           name="image" 
                                           accept="image/*">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Leave empty to keep current image. Recommended size: 400x300px. Max size: 2MB
                                    </small>
                                </div>

                                <div class="mb-3">
                                    <label for="published_date" class="form-label">Published Date <span class="text-danger">*</span></label>
                                    <input type="date" 
                                           class="form-control @error('published_date') is-invalid @enderror" 
                                           id="published_date" 
                                           name="published_date" 
                                           value="{{ old('published_date', $latestNews->published_date->format('Y-m-d')) }}" 
                                           required>
                                    @error('published_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               id="is_active" 
                                               name="is_active" 
                                               value="1" 
                                               {{ old('is_active', $latestNews->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Active (Show on website)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <hr>
                                <div class="d-flex justify-content-between gap-2">
                                    <a href="{{ route('admin') }}" class="btn btn-secondary">
                                        <i class="fa fa-arrow-left me-2"></i>Back to Dashboard
                                    </a>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.latest-news.index') }}" class="btn btn-secondary">Cancel</a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Update News
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // You can add image preview functionality here if needed
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection