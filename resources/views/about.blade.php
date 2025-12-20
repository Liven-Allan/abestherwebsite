@extends('layouts.app')

@section('title', 'About Us - School Website')
@section('description', 'Learn more about our school')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" 
     style="background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url('{{ $headerBackgroundImage }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container text-center py-5">
        <h1 class="display-4 text-primary animated slideInDown mb-3">About Us</h1>
        <h2 class="display-2 text-white animated slideInDown">Admissions for 2026 Intake In Progress</h2>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">About</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Background History Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="mb-4">Background History</h1>
            <p class="fs-5">Abesther Primary School is a premier private mixed day and boarding Nursery and Primary School located off Ggaba Road in Kiwafu Zone B, Kansanga Parish, Makindye Division. The school operates on Plot 3730, Block 244, offering a secure, accessible, and learner-friendly environment that supports academic excellence and holistic development.</p>
        </div>
    </div>
</div>
<!-- Background History End -->

<!-- Legal Status Start -->
<div class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="mb-4">Legal Status and Accreditation</h1>
            <p class="fs-5">The school is fully registered by the Ministry of Education and Sports under Registration Number PPS/0000 and accredited by the Uganda National Examinations Board (UNEB) with Center Number 00000. This recognition assures parents and guardians of compliance with national standards and a commitment to quality education.</p>
        </div>
    </div>
</div>
<!-- Legal Status End -->

<!-- Founding and Growth Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="mb-4">Founding and Growth</h1>
            <p class="fs-5">Established in 2000, Abesther Primary School began its journey with only 73 pupils. Guided by strong leadership and a clear vision, the school has since grown into a vibrant community of over 400 learners from across East Africa and beyond. This remarkable transformation reflects the school's dedication to producing well-rounded, disciplined, and academically excellent pupils.</p>
        </div>
    </div>
</div>
<!-- Founding and Growth End -->

<!-- Identity and Philosophy Start -->
<div class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="mb-4">Identity and Philosophy</h1>
            <div class="text-start">
                <ul class="fs-5 list-unstyled">
                    <li class="mb-3"><strong>• Motto:</strong> For Quality Education</li>
                    <li class="mb-3"><strong>• Vision:</strong> To be a center for holistic education.</li>
                    <li class="mb-3"><strong>• Mission:</strong> To produce graduates with excellent academic qualifications who are disciplined, morally upright, and culturally enriched.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Identity and Philosophy End -->

<!-- Core Objectives Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="mb-4">Core Objectives</h1>
            <div class="text-start">
                <ol class="fs-5">
                    <li class="mb-3">To provide effective teaching and learning in a conducive environment.</li>
                    <li class="mb-3">To instill a high degree of discipline in all learners.</li>
                    <li class="mb-3">To develop strong communication skills and responsible citizenship.</li>
                    <li class="mb-3">To promote a friendly, supportive, and inclusive school atmosphere.</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Core Objectives End -->
@endsection