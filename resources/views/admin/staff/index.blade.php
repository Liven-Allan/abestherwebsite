@extends('layouts.app')

@section('title', 'Staff Management - Admin')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid py-5 page-header position-relative mb-5"
     style="background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url('{{ $headerBackgroundImage }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container py-5 text-center">
        <h1 class="display-2 text-white animated slideInDown mb-4">Staff Management</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Staff</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Staff Management Start -->
<div class="container-xxl py-5">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Manage Staff Members</h2>
            <a href="{{ route('admin.staff.create') }}" class="btn btn-primary">
                <i class="fa fa-plus me-2"></i>Add New Staff Member
            </a>
        </div>

        <div class="bg-light rounded p-4">
            @if($staff->count() > 0)
                <div class="row g-4">
                    @foreach($staff as $member)
                    <div class="col-lg-4 col-md-6">
                        <div class="bg-white rounded p-4 text-center h-100 shadow-sm">
                            <div class="mb-3">
                                <img src="{{ asset($member->profile_picture) }}" alt="{{ $member->full_name }}" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                            </div>
                            <h5 class="mb-2">{{ $member->full_name }}</h5>
                            <p class="text-muted mb-3">{{ $member->role }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <small class="text-muted">Order: {{ $member->sort_order }}</small>
                                    @if($member->is_active)
                                        <span class="badge bg-success ms-2">Active</span>
                                    @else
                                        <span class="badge bg-secondary ms-2">Inactive</span>
                                    @endif
                                </div>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.staff.edit', $member) }}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.staff.destroy', $member) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this staff member?')">
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
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fa fa-users fa-3x text-muted mb-3"></i>
                    <h4>No staff members found</h4>
                    <p class="text-muted">Create your first staff member to get started.</p>
                    <a href="{{ route('admin.staff.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus me-2"></i>Add First Staff Member
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
<!-- Staff Management End -->
@endsection