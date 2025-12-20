@extends('layouts.app')

@section('title', 'Contact Us - School Website')
@section('description', 'Get in touch with our school')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s"
     style="background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url('{{ $headerBackgroundImage }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-3">Contact Us</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Contact</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Get In Touch!</h1>
            
        </div>
        <div class="row g-4 mb-5">
            @php $delay = 0.1; @endphp
            
            @if(isset($contactInfos['address']) && $contactInfos['address']->count() > 0)
                @foreach($contactInfos['address'] as $address)
                    <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="{{ $delay }}s">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                            <i class="fa {{ $address->icon }} fa-2x text-primary"></i>
                        </div>
                        <h6>{{ $address->value }}</h6>
                        @if($address->label)
                            <small class="text-muted">{{ $address->label }}</small>
                        @endif
                    </div>
                    @php $delay += 0.2; @endphp
                @endforeach
            @endif
            
            @if(isset($contactInfos['email']) && $contactInfos['email']->count() > 0)
                @foreach($contactInfos['email'] as $email)
                    <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="{{ $delay }}s">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                            <i class="fa {{ $email->icon }} fa-2x text-primary"></i>
                        </div>
                        <h6>{{ $email->value }}</h6>
                        @if($email->label)
                            <small class="text-muted">{{ $email->label }}</small>
                        @endif
                    </div>
                    @php $delay += 0.2; @endphp
                @endforeach
            @endif
            
            @if(isset($contactInfos['phone']) && $contactInfos['phone']->count() > 0)
                @foreach($contactInfos['phone'] as $phone)
                    <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="{{ $delay }}s">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                            <i class="fa {{ $phone->icon }} fa-2x text-primary"></i>
                        </div>
                        <h6>{{ $phone->value }}</h6>
                        @if($phone->label)
                            <small class="text-muted">{{ $phone->label }}</small>
                        @endif
                    </div>
                    @php $delay += 0.2; @endphp
                @endforeach
            @endif
        </div>

    </div>
</div>
<!-- Contact End -->
@endsection