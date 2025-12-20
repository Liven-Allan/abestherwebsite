@extends('layouts.app')

@section('title', 'Edit Staff Member - Admin')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid py-5 page-header position-relative mb-5">
    <div class="container py-5 text-center">
        <h1 class="display-2 text-white animated slideInDown mb-4">Edit Staff Member</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.staff.index') }}">Staff</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Edit Staff</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Edit Staff Form Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-light rounded p-5">
                    <h2 class="mb-4">Edit Staff Member</h2>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.staff.update', $staff) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{ old('first_name', $staff->first_name) }}" required>
                                    <label for="first_name">First Name</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ old('last_name', $staff->last_name) }}" required>
                                    <label for="last_name">Last Name</label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="role" name="role" placeholder="Role" value="{{ old('role', $staff->role) }}" required>
                                    <label for="role">Role/Position</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="sort_order" name="sort_order" placeholder="Sort Order" value="{{ old('sort_order', $staff->sort_order) }}" min="0" required>
                                    <label for="sort_order">Display Order</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', $staff->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active (Show on website)
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <label for="profile_picture" class="form-label">Profile Picture</label>
                                <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">
                                <div class="form-text">Leave empty to keep current image. Upload new image to replace (JPEG, PNG, JPG, GIF - Max: 2MB)</div>
                                
                                @if($staff->profile_picture)
                                    <div class="mt-3">
                                        <p class="mb-2">Current Image:</p>
                                        <img src="{{ asset($staff->profile_picture) }}" alt="Current profile" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                                    </div>
                                @endif
                            </div>
                            
                            <div class="col-12">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save me-2"></i>Update Staff Member
                                    </button>
                                    <a href="{{ route('admin.staff.index') }}" class="btn btn-secondary">
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
<!-- Edit Staff Form End -->
@endsection