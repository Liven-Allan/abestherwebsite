@extends('layouts.app')

@section('title', 'Fees Structure - School Website')

@section('content')
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s"
     style="background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url('{{ $headerBackgroundImage }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container text-center py-5">
        <h1 class="display-4 text-primary animated slideInDown mb-3">Fees Structure</h1>
        <h2 class="display-2 text-white animated slideInDown">School Fees & other Fees</h2>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Fees Structure</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Fees Structure Images Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Tuition Fees Image -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-light rounded p-4 text-center">
                    <h3 class="mb-4">{{ $tuitionFees->title ?? 'Tuition Fees' }}</h3>
                    <div class="position-relative">
                        @php
                            $imagePath = $tuitionFees->image_path ?? 'img/tuition_fees.png';
                        @endphp
                        <img class="img-fluid rounded" src="{{ asset($imagePath) }}" alt="Tuition Fees Structure" style="width: 100%; height: auto; max-height: 600px; object-fit: contain;">
                    </div>
                    @if($tuitionFees && $tuitionFees->description)
                        <p class="mt-3 text-muted">{{ $tuitionFees->description }}</p>
                    @endif
                </div>
            </div>
            
            <!-- Other Fees Image -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="bg-light rounded p-4 text-center">
                    <h3 class="mb-4">{{ $uniformFees->title ?? 'Other Fees (Uniforms & More)' }}</h3>
                    <div class="position-relative">
                        <img class="img-fluid rounded" src="{{ asset($uniformFees->image_path ?? 'img/school_uniform_fees.png') }}" alt="Other Fees Structure" style="width: 100%; height: auto; max-height: 600px; object-fit: contain;">
                    </div>
                    @if($uniformFees && $uniformFees->description)
                        <p class="mt-3 text-muted">{{ $uniformFees->description }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fees Structure Images End -->

<!-- How to Pay Fees Start -->
<div class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">How to Pay Fees</h1>
        </div>
        <div class="row g-4">
            <!-- MTN Payment Card -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-white rounded p-4 text-center h-100 shadow">
                    <div class="mb-4">
                        @php
                            $mtnImagePath = $mtnPayment->image_path ?? 'img/mtn.png';
                        @endphp
                        <img class="img-fluid" src="{{ asset($mtnImagePath) }}" alt="{{ $mtnPayment->title ?? 'MTN Mobile Money' }}" style="max-height: 100px;">
                    </div>
                    <h4 class="mb-3">{{ $mtnPayment->title ?? 'MTN Mobile Money' }}</h4>
                    <p class="mb-0">{{ $mtnPayment->description ?? 'Dial *165#, Select Payments, Select School Fees, select School Pay, enter the Student Code, Verify the student details, enter the amount to pay, and confirm with your mobile money pin' }}</p>
                </div>
            </div>
            
            <!-- Airtel Payment Card -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="bg-white rounded p-4 text-center h-100 shadow">
                    <div class="mb-4">
                        @php
                            $airtelImagePath = $airtelPayment->image_path ?? 'img/airtel.png';
                        @endphp
                        <img class="img-fluid" src="{{ asset($airtelImagePath) }}" alt="{{ $airtelPayment->title ?? 'Airtel Money' }}" style="max-height: 100px;">
                    </div>
                    <h4 class="mb-3">{{ $airtelPayment->title ?? 'Airtel Money' }}</h4>
                    <p class="mb-0">{{ $airtelPayment->description ?? 'Dial *185#, Select Payments, Select School Fees, select School Pay, enter the Student Code, Verify the student details, enter the amount to pay, and confirm with your mobile money pin' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- How to Pay Fees End -->
@endsection