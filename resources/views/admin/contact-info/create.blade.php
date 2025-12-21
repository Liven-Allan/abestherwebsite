@extends('layouts.app')

@section('title', 'Add Contact Information')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid py-5 page-header position-relative mb-5"
     style="background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url('{{ $headerBackgroundImage }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container py-5 text-center">
        <h1 class="display-2 text-white animated slideInDown mb-4">Add Contact Information</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.contact-info.index') }}">Contact Info</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Add</li>
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
                    <h5 class="mb-0">Add Contact Information</h5>
                    <a href="{{ route('admin.contact-info.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.contact-info.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                                    <select class="form-select @error('type') is-invalid @enderror" 
                                            id="type" 
                                            name="type" 
                                            required>
                                        <option value="">Select Type</option>
                                        <option value="address" {{ old('type') == 'address' ? 'selected' : '' }}>Address</option>
                                        <option value="phone" {{ old('type') == 'phone' ? 'selected' : '' }}>Phone</option>
                                        <option value="email" {{ old('type') == 'email' ? 'selected' : '' }}>Email</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="label" class="form-label">Label</label>
                                    <input type="text" 
                                           class="form-control @error('label') is-invalid @enderror" 
                                           id="label" 
                                           name="label" 
                                           value="{{ old('label') }}" 
                                           placeholder="e.g., Main Office, Admissions">
                                    @error('label')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Optional. If empty, will use the type as label.
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="value" class="form-label">Value <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('value') is-invalid @enderror" 
                                              id="value" 
                                              name="value" 
                                              rows="3" 
                                              required 
                                              placeholder="Enter the contact information">{{ old('value') }}</textarea>
                                    @error('value')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="sort_order" class="form-label">Sort Order <span class="text-danger">*</span></label>
                                    <input type="number" 
                                           class="form-control @error('sort_order') is-invalid @enderror" 
                                           id="sort_order" 
                                           name="sort_order" 
                                           value="{{ old('sort_order', 1) }}" 
                                           min="0" 
                                           required>
                                    @error('sort_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Lower numbers appear first.
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               id="is_active" 
                                               name="is_active" 
                                               value="1" 
                                               {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Active (Show on website)
                                        </label>
                                    </div>
                                </div>

                                <hr>
                                <div class="d-flex justify-content-between gap-2">
                                    <a href="{{ route('admin') }}" class="btn btn-secondary">
                                        <i class="fa fa-arrow-left me-2"></i>Back to Dashboard
                                    </a>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.contact-info.index') }}" class="btn btn-secondary">Cancel</a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Save Contact Info
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
@endsection