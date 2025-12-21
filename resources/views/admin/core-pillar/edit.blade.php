@extends('layouts.app')

@section('title', 'Edit Core Pillar - Admin')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid py-5 page-header position-relative mb-5"
     style="background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url('{{ $headerBackgroundImage }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container py-5 text-center">
        <h1 class="display-2 text-white animated slideInDown mb-4">Edit Core Pillar</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.core-pillar.index') }}">Core Pillars</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Edit Pillar</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Edit Core Pillar Form Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-light rounded p-5">
                    <h2 class="mb-4">Edit Core Pillar</h2>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.core-pillar.update', $corePillar) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="icon" name="icon" required>
                                        <option value="">Select Icon</option>
                                        <option value="fa-child" {{ old('icon', $corePillar->icon) == 'fa-child' ? 'selected' : '' }}>Child (fa-child)</option>
                                        <option value="fa-chalkboard-teacher" {{ old('icon', $corePillar->icon) == 'fa-chalkboard-teacher' ? 'selected' : '' }}>Teacher (fa-chalkboard-teacher)</option>
                                        <option value="fa-trophy" {{ old('icon', $corePillar->icon) == 'fa-trophy' ? 'selected' : '' }}>Trophy (fa-trophy)</option>
                                        <option value="fa-laptop" {{ old('icon', $corePillar->icon) == 'fa-laptop' ? 'selected' : '' }}>Laptop (fa-laptop)</option>
                                        <option value="fa-book" {{ old('icon', $corePillar->icon) == 'fa-book' ? 'selected' : '' }}>Book (fa-book)</option>
                                        <option value="fa-graduation-cap" {{ old('icon', $corePillar->icon) == 'fa-graduation-cap' ? 'selected' : '' }}>Graduation Cap (fa-graduation-cap)</option>
                                        <option value="fa-users" {{ old('icon', $corePillar->icon) == 'fa-users' ? 'selected' : '' }}>Users (fa-users)</option>
                                        <option value="fa-star" {{ old('icon', $corePillar->icon) == 'fa-star' ? 'selected' : '' }}>Star (fa-star)</option>
                                        <option value="fa-heart" {{ old('icon', $corePillar->icon) == 'fa-heart' ? 'selected' : '' }}>Heart (fa-heart)</option>
                                        <option value="fa-shield-alt" {{ old('icon', $corePillar->icon) == 'fa-shield-alt' ? 'selected' : '' }}>Shield (fa-shield-alt)</option>
                                    </select>
                                    <label for="icon">Icon</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="icon_color" name="icon_color" required>
                                        <option value="">Select Color</option>
                                        <option value="bg-primary" {{ old('icon_color', $corePillar->icon_color) == 'bg-primary' ? 'selected' : '' }}>Primary Blue</option>
                                        <option value="bg-success" {{ old('icon_color', $corePillar->icon_color) == 'bg-success' ? 'selected' : '' }}>Success Green</option>
                                        <option value="bg-warning" {{ old('icon_color', $corePillar->icon_color) == 'bg-warning' ? 'selected' : '' }}>Warning Yellow</option>
                                        <option value="bg-info" {{ old('icon_color', $corePillar->icon_color) == 'bg-info' ? 'selected' : '' }}>Info Light Blue</option>
                                        <option value="bg-danger" {{ old('icon_color', $corePillar->icon_color) == 'bg-danger' ? 'selected' : '' }}>Danger Red</option>
                                        <option value="bg-secondary" {{ old('icon_color', $corePillar->icon_color) == 'bg-secondary' ? 'selected' : '' }}>Secondary Gray</option>
                                    </select>
                                    <label for="icon_color">Icon Background Color</label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title', $corePillar->title) }}" required>
                                    <label for="title">Pillar Title</label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="description" name="description" placeholder="Description" style="height: 120px;" required>{{ old('description', $corePillar->description) }}</textarea>
                                    <label for="description">Pillar Description</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="sort_order" name="sort_order" placeholder="Sort Order" value="{{ old('sort_order', $corePillar->sort_order) }}" min="0" required>
                                    <label for="sort_order">Display Order</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', $corePillar->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active (Show on website)
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save me-2"></i>Update Pillar
                                    </button>
                                    <a href="{{ route('admin.core-pillar.index') }}" class="btn btn-secondary">
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
<!-- Edit Core Pillar Form End -->
@endsection