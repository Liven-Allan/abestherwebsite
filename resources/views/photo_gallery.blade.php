@extends('layouts.app')

@section('title', 'Photo Gallery - School Website')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s"
     style="background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url('{{ $headerBackgroundImage }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-3">Photo Gallery</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Photo Gallery</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Photo Gallery Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Our School Gallery</h1>
            <p>Explore the vibrant life at our school through these memorable moments and activities.</p>
        </div>
        
        @if($photos->count() > 0)
            <div class="row g-4">
                @foreach($photos as $index => $photo)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 + ($index * 0.1) }}s">
                        <div class="bg-light rounded overflow-hidden h-100 shadow-sm">
                            <div class="position-relative">
                                <img class="img-fluid w-100" 
                                     src="{{ $photo->image_url }}" 
                                     alt="{{ $photo->title }}" 
                                     style="height: 250px; object-fit: cover;">
                                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" 
                                     style="background: rgba(24, 29, 56, 0); transition: all 0.3s;"
                                     onmouseover="this.style.background='rgba(24, 29, 56, 0.7)'"
                                     onmouseout="this.style.background='rgba(24, 29, 56, 0)'">
                                    <a href="{{ $photo->image_url }}" 
                                       class="btn btn-primary rounded-pill py-2 px-4" 
                                       data-bs-toggle="modal" 
                                       data-bs-target="#photoModal{{ $photo->id }}"
                                       style="opacity: 0; transition: all 0.3s;"
                                       onmouseover="this.parentElement.style.background='rgba(24, 29, 56, 0.7)'; this.style.opacity='1'"
                                       onmouseout="this.parentElement.style.background='rgba(24, 29, 56, 0)'; this.style.opacity='0'">
                                        <i class="fa fa-eye me-2"></i>View
                                    </a>
                                </div>
                            </div>
                            <div class="p-4">
                                <h5 class="mb-3">{{ $photo->title }}</h5>
                                @if($photo->description)
                                    <p class="mb-0">{{ $photo->short_description }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Photo Modal -->
                    <div class="modal fade" id="photoModal{{ $photo->id }}" tabindex="-1" aria-labelledby="photoModalLabel{{ $photo->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="photoModalLabel{{ $photo->id }}">{{ $photo->title }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="{{ $photo->image_url }}" 
                                         alt="{{ $photo->title }}" 
                                         class="img-fluid rounded mb-3"
                                         style="max-height: 400px;">
                                    @if($photo->description)
                                        <p class="text-muted">{{ $photo->description }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center">
                <div class="bg-light rounded p-5">
                    <i class="fa fa-images fa-3x text-muted mb-3"></i>
                    <h3 class="text-muted">No Photos Available</h3>
                    <p class="text-muted">Check back later for our school photo gallery.</p>
                </div>
            </div>
        @endif
    </div>
</div>
<!-- Photo Gallery End -->

<style>
.gallery-item:hover .overlay {
    opacity: 1;
}

.overlay {
    opacity: 0;
    transition: all 0.3s ease;
}
</style>
@endsection