@extends('layouts.app')

@section('title', 'Edit Fee Structure - Admin')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid py-5 page-header position-relative mb-5"
     style="background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url('{{ $headerBackgroundImage }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container py-5 text-center">
        <h1 class="display-2 text-white animated slideInDown mb-4">Edit Fee Structure</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.fee-structure.index') }}">Fee Structure</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Edit {{ ucfirst($feeStructure->type) }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Edit Fee Structure Form Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-light rounded p-5">
                    <h2 class="mb-4">Edit {{ ucfirst(str_replace('_', ' ', $feeStructure->type)) }} 
                        @if($feeStructure->type === 'mtn_payment' || $feeStructure->type === 'airtel_payment')
                            Image
                        @else
                            Fee Structure
                        @endif
                    </h2>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.fee-structure.update', $feeStructure->type) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title', $feeStructure->title) }}" required>
                                    <label for="title">
                                        @if($feeStructure->type === 'mtn_payment' || $feeStructure->type === 'airtel_payment')
                                            Payment Method Title
                                        @else
                                            Fee Structure Title
                                        @endif
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="description" name="description" placeholder="Description" style="height: 100px;">{{ old('description', $feeStructure->description) }}</textarea>
                                    <label for="description">
                                        @if($feeStructure->type === 'mtn_payment' || $feeStructure->type === 'airtel_payment')
                                            Payment Instructions (Optional)
                                        @else
                                            Description (Optional)
                                        @endif
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <label for="image" class="form-label">
                                    @if($feeStructure->type === 'mtn_payment' || $feeStructure->type === 'airtel_payment')
                                        Payment Method Image
                                    @else
                                        Fee Structure Image
                                    @endif
                                </label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                <div class="form-text">Leave empty to keep current image. Upload new image to replace (JPEG, PNG, JPG, GIF - Max: 2MB)</div>
                                
                                @if($feeStructure->image_path)
                                    <div class="mt-3">
                                        <p class="mb-2">Current Image:</p>
                                        <img src="{{ asset($feeStructure->image_path) }}" alt="Current fee structure" class="img-thumbnail" style="max-width: 400px; max-height: 300px; object-fit: cover;">
                                    </div>
                                @endif
                            </div>
                            
                            <div class="col-12">
                                <div class="alert alert-info">
                                    <i class="fa fa-info-circle me-2"></i>
                                    <strong>Note:</strong> 
                                    @if($feeStructure->type === 'tuition')
                                        This left side image will be displayed on the fees structure page.
                                    @elseif($feeStructure->type === 'uniform')
                                        This right side image will be displayed on the fees structure page.
                                    @elseif($feeStructure->type === 'mtn_payment')
                                        This image will be displayed above the MTN payment instructions.
                                    @elseif($feeStructure->type === 'airtel_payment')
                                        This image will be displayed above the Airtel payment instructions.
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save me-2"></i>Update 
                                        @if($feeStructure->type === 'mtn_payment' || $feeStructure->type === 'airtel_payment')
                                            Payment Image
                                        @else
                                            Fee Structure
                                        @endif
                                    </button>
                                    <a href="{{ route('admin.fee-structure.index') }}" class="btn btn-secondary">
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
<!-- Edit Fee Structure Form End -->
@endsection