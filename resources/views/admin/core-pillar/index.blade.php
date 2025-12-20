@extends('layouts.app')

@section('title', 'Core Pillars Management - Admin')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid py-5 page-header position-relative mb-5">
    <div class="container py-5 text-center">
        <h1 class="display-2 text-white animated slideInDown mb-4">Core Pillars Management</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Core Pillars</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Core Pillars Management Start -->
<div class="container-xxl py-5">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2>Manage Core Pillars</h2>
                <p class="text-muted mb-0">Maximum of 4 pillars allowed ({{ $corePillars->count() }}/4)</p>
            </div>
            @if($canAddMore)
                <a href="{{ route('admin.core-pillar.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus me-2"></i>Add New Pillar
                </a>
            @else
                <button class="btn btn-secondary" disabled>
                    <i class="fa fa-ban me-2"></i>Maximum Reached (4/4)
                </button>
            @endif
        </div>

        <div class="bg-light rounded p-4">
            @if($corePillars->count() > 0)
                <div class="row g-4">
                    @foreach($corePillars as $pillar)
                    <div class="col-lg-6 col-md-12">
                        <div class="bg-white rounded p-4 h-100 shadow-sm">
                            <div class="d-flex align-items-start">
                                <div class="d-inline-flex align-items-center justify-content-center {{ $pillar->icon_color }} rounded-circle me-3" style="width: 60px; height: 60px; flex-shrink: 0;">
                                    <i class="fa {{ $pillar->icon }} fa-lg text-white"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="mb-2">{{ $pillar->title }}</h5>
                                    <p class="text-muted mb-3">{{ Str::limit($pillar->description, 100) }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <small class="text-muted">Order: {{ $pillar->sort_order }}</small>
                                            @if($pillar->is_active)
                                                <span class="badge bg-success ms-2">Active</span>
                                            @else
                                                <span class="badge bg-secondary ms-2">Inactive</span>
                                            @endif
                                        </div>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.core-pillar.edit', $pillar) }}" class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.core-pillar.destroy', $pillar) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this pillar?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fa fa-star fa-3x text-muted mb-3"></i>
                    <h4>No core pillars found</h4>
                    <p class="text-muted">Create your first core pillar to get started.</p>
                    <a href="{{ route('admin.core-pillar.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus me-2"></i>Add First Pillar
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
<!-- Core Pillars Management End -->
@endsection