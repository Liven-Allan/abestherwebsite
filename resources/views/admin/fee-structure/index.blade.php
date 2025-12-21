@extends('layouts.app')

@section('title', 'Fee Structure Management - Admin')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid py-5 page-header position-relative mb-5"
     style="background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url('{{ $headerBackgroundImage }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container py-5 text-center">
        <h1 class="display-2 text-white animated slideInDown mb-4">Fee Structure Management</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Fee Structure</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Fee Structure Management Start -->
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

        <div class="mb-4">
            <h2>Manage Fee Structure & Payment Images</h2>
            <p class="text-muted">Update the fee structure images and payment method images displayed on the fees page</p>
        </div>

        <div class="row g-4">
            <!-- Tuition Fees Card -->
            <div class="col-lg-6">
                <div class="bg-light rounded p-4 h-100">
                    <div class="text-center mb-4">
                        <h4 class="text-primary">Tuition Fees</h4>
                        <p class="text-muted mb-0">Left side image</p>
                    </div>
                    
                    @if($tuitionFees)
                        <div class="text-center mb-4">
                            <img src="{{ asset($tuitionFees->image_path) }}" alt="Tuition Fees" class="img-fluid rounded" style="max-height: 300px; object-fit: cover;">
                        </div>
                        
                        <div class="mb-3">
                            <h6>Title:</h6>
                            <p class="mb-2">{{ $tuitionFees->title }}</p>
                        </div>
                        
                        @if($tuitionFees->description)
                            <div class="mb-3">
                                <h6>Description:</h6>
                                <p class="mb-2">{{ $tuitionFees->description }}</p>
                            </div>
                        @endif
                        
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.fee-structure.edit', 'tuition') }}" class="btn btn-warning">
                                <i class="fa fa-edit me-2"></i>Edit
                            </a>
                            <form action="{{ route('admin.fee-structure.destroy', 'tuition') }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this fee structure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash me-2"></i>Delete
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fa fa-image fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No tuition fees structure found</p>
                            <a href="{{ route('admin.fee-structure.edit', 'tuition') }}" class="btn btn-primary">
                                <i class="fa fa-plus me-2"></i>Add Tuition Fees
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Uniform Fees Card -->
            <div class="col-lg-6">
                <div class="bg-light rounded p-4 h-100">
                    <div class="text-center mb-4">
                        <h4 class="text-success">Other Fees (Uniforms & More)</h4>
                        <p class="text-muted mb-0">Right side image</p>
                    </div>
                    
                    @if($uniformFees)
                        <div class="text-center mb-4">
                            <img src="{{ asset($uniformFees->image_path) }}" alt="Uniform Fees" class="img-fluid rounded" style="max-height: 300px; object-fit: cover;">
                        </div>
                        
                        <div class="mb-3">
                            <h6>Title:</h6>
                            <p class="mb-2">{{ $uniformFees->title }}</p>
                        </div>
                        
                        @if($uniformFees->description)
                            <div class="mb-3">
                                <h6>Description:</h6>
                                <p class="mb-2">{{ $uniformFees->description }}</p>
                            </div>
                        @endif
                        
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.fee-structure.edit', 'uniform') }}" class="btn btn-warning">
                                <i class="fa fa-edit me-2"></i>Edit
                            </a>
                            <form action="{{ route('admin.fee-structure.destroy', 'uniform') }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this fee structure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash me-2"></i>Delete
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fa fa-image fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No uniform fees structure found</p>
                            <a href="{{ route('admin.fee-structure.edit', 'uniform') }}" class="btn btn-success">
                                <i class="fa fa-plus me-2"></i>Add Uniform Fees
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Payment Methods Section -->
        <div class="mt-5">
            <h3 class="mb-4">Payment Method Images</h3>
            <div class="row g-4">
                <!-- MTN Payment Card -->
                <div class="col-lg-6">
                    <div class="bg-light rounded p-4 h-100">
                        <div class="text-center mb-4">
                            <h4 class="text-warning">MTN Mobile Money</h4>
                            <p class="text-muted mb-0">Payment instructions image</p>
                        </div>
                        
                        @if($mtnPayment)
                            <div class="text-center mb-4">
                                <img src="{{ asset($mtnPayment->image_path) }}" alt="MTN Payment" class="img-fluid rounded" style="max-height: 200px; object-fit: contain;">
                            </div>
                            
                            <div class="mb-3">
                                <h6>Title:</h6>
                                <p class="mb-2">{{ $mtnPayment->title }}</p>
                            </div>
                            
                            @if($mtnPayment->description)
                                <div class="mb-3">
                                    <h6>Instructions:</h6>
                                    <p class="mb-2 small">{{ $mtnPayment->description }}</p>
                                </div>
                            @endif
                            
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.fee-structure.edit', 'mtn_payment') }}" class="btn btn-warning">
                                    <i class="fa fa-edit me-2"></i>Edit
                                </a>
                                <form action="{{ route('admin.fee-structure.destroy', 'mtn_payment') }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this payment method?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash me-2"></i>Delete
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fa fa-mobile fa-3x text-muted mb-3"></i>
                                <p class="text-muted">No MTN payment method found</p>
                                <a href="{{ route('admin.fee-structure.edit', 'mtn_payment') }}" class="btn btn-warning">
                                    <i class="fa fa-plus me-2"></i>Add MTN Payment
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Airtel Payment Card -->
                <div class="col-lg-6">
                    <div class="bg-light rounded p-4 h-100">
                        <div class="text-center mb-4">
                            <h4 class="text-danger">Airtel Money</h4>
                            <p class="text-muted mb-0">Payment instructions image</p>
                        </div>
                        
                        @if($airtelPayment)
                            <div class="text-center mb-4">
                                <img src="{{ asset($airtelPayment->image_path) }}" alt="Airtel Payment" class="img-fluid rounded" style="max-height: 200px; object-fit: contain;">
                            </div>
                            
                            <div class="mb-3">
                                <h6>Title:</h6>
                                <p class="mb-2">{{ $airtelPayment->title }}</p>
                            </div>
                            
                            @if($airtelPayment->description)
                                <div class="mb-3">
                                    <h6>Instructions:</h6>
                                    <p class="mb-2 small">{{ $airtelPayment->description }}</p>
                                </div>
                            @endif
                            
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.fee-structure.edit', 'airtel_payment') }}" class="btn btn-warning">
                                    <i class="fa fa-edit me-2"></i>Edit
                                </a>
                                <form action="{{ route('admin.fee-structure.destroy', 'airtel_payment') }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this payment method?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash me-2"></i>Delete
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fa fa-mobile fa-3x text-muted mb-3"></i>
                                <p class="text-muted">No Airtel payment method found</p>
                                <a href="{{ route('admin.fee-structure.edit', 'airtel_payment') }}" class="btn btn-danger">
                                    <i class="fa fa-plus me-2"></i>Add Airtel Payment
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('admin') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left me-2"></i>Back to Dashboard
            </a>
        </div>
    </div>
</div>
<!-- Fee Structure Management End -->
@endsection