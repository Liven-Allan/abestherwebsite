@extends('layouts.app')

@section('title', 'Carousel Management - Admin')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid py-5 page-header position-relative mb-5">
    <div class="container py-5 text-center">
        <h1 class="display-2 text-white animated slideInDown mb-4">Carousel Management</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Carousel</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Carousel Management Start -->
<div class="container-xxl py-5">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Manage Carousel Slides</h2>
            <a href="{{ route('admin.carousel.create') }}" class="btn btn-primary">
                <i class="fa fa-plus me-2"></i>Add New Slide
            </a>
        </div>

        <div class="bg-light rounded p-4">
            @if($carousels->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>First Text</th>
                                <th>Second Text</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carousels as $carousel)
                            <tr>
                                <td>
                                    <img src="{{ asset($carousel->background_image) }}" alt="Slide" style="width: 80px; height: 50px; object-fit: cover;" class="rounded">
                                </td>
                                <td>{{ Str::limit($carousel->first_text, 20) }}</td>
                                <td>{{ Str::limit($carousel->second_text, 30) }}</td>
                                <td>{{ $carousel->sort_order }}</td>
                                <td>
                                    @if($carousel->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.carousel.edit', $carousel) }}" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.carousel.destroy', $carousel) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this slide?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fa fa-images fa-3x text-muted mb-3"></i>
                    <h4>No carousel slides found</h4>
                    <p class="text-muted">Create your first carousel slide to get started.</p>
                    <a href="{{ route('admin.carousel.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus me-2"></i>Add First Slide
                    </a>
                </div>
            @endif
        </div>

        <div class="mt-4">
            <a href="{{ route('admin') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left me-2"></i>Back to Dashboard
            </a>
        </div>
    </div>
</div>
<!-- Carousel Management End -->
@endsection