@extends('layouts.app')

@section('title', 'Site Settings')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid py-5 page-header position-relative mb-5"
     style="background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url('{{ $headerBackgroundImage }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container py-5 text-center">
        <h1 class="display-2 text-white animated slideInDown mb-4">Site Settings</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Site Settings</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Site Settings</h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin.site-setting.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="school_name" class="form-label">School Name <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('school_name') is-invalid @enderror" 
                                           id="school_name" 
                                           name="school_name" 
                                           value="{{ old('school_name', $siteSetting->school_name) }}" 
                                           required>
                                    @error('school_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Logo Type <span class="text-danger">*</span></label>
                                    <div class="mb-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="logo_type" id="logo_type_icon" value="icon" 
                                                   {{ old('logo_type', $siteSetting->logo_type) == 'icon' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="logo_type_icon">
                                                FontAwesome Icon
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="logo_type" id="logo_type_image" value="image"
                                                   {{ old('logo_type', $siteSetting->logo_type) == 'image' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="logo_type_image">
                                                Upload Image
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Icon Option -->
                                <div class="mb-3" id="icon-section" style="{{ old('logo_type', $siteSetting->logo_type) == 'image' ? 'display: none;' : '' }}">
                                    <label for="school_logo_icon" class="form-label">School Logo Icon</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa {{ old('school_logo_icon', $siteSetting->school_logo_icon) }}" id="icon-preview"></i>
                                        </span>
                                        <input type="text" 
                                               class="form-control @error('school_logo_icon') is-invalid @enderror" 
                                               id="school_logo_icon" 
                                               name="school_logo_icon" 
                                               value="{{ old('school_logo_icon', $siteSetting->school_logo_icon) }}" 
                                               placeholder="e.g., fa-book-reader, fa-graduation-cap">
                                    </div>
                                    @error('school_logo_icon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Use FontAwesome icon classes. Preview updates as you type.
                                        <a href="https://fontawesome.com/icons" target="_blank">Browse icons</a>
                                    </small>
                                </div>

                                <!-- Image Option -->
                                <div class="mb-3" id="image-section" style="{{ old('logo_type', $siteSetting->logo_type) == 'icon' ? 'display: none;' : '' }}">
                                    <label for="logo_image" class="form-label">School Logo Image</label>
                                    @if($siteSetting->isUsingImageLogo())
                                        <div class="mb-2">
                                            <img src="{{ $siteSetting->getLogoImageUrl() }}" 
                                                 alt="Current Logo" 
                                                 class="img-thumbnail" 
                                                 style="max-height: 60px;">
                                            <small class="text-muted d-block">Current logo</small>
                                        </div>
                                    @endif
                                    <input type="file" 
                                           class="form-control @error('logo_image') is-invalid @enderror" 
                                           id="logo_image" 
                                           name="logo_image" 
                                           accept="image/*">
                                    @error('logo_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Recommended size: 40px height. Supported formats: JPEG, PNG, JPG, GIF, SVG. Max size: 2MB
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h6 class="text-muted mb-3">Social Media Links (Optional)</h6>
                                
                                <div class="mb-3">
                                    <label for="facebook_url" class="form-label">
                                        <i class="fab fa-facebook-f me-2"></i>Facebook URL
                                    </label>
                                    <input type="url" 
                                           class="form-control @error('facebook_url') is-invalid @enderror" 
                                           id="facebook_url" 
                                           name="facebook_url" 
                                           value="{{ old('facebook_url', $siteSetting->facebook_url) }}" 
                                           placeholder="https://facebook.com/your-school">
                                    @error('facebook_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="twitter_url" class="form-label">
                                        <i class="fab fa-twitter me-2"></i>Twitter URL
                                    </label>
                                    <input type="url" 
                                           class="form-control @error('twitter_url') is-invalid @enderror" 
                                           id="twitter_url" 
                                           name="twitter_url" 
                                           value="{{ old('twitter_url', $siteSetting->twitter_url) }}" 
                                           placeholder="https://twitter.com/your-school">
                                    @error('twitter_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="youtube_url" class="form-label">
                                        <i class="fab fa-youtube me-2"></i>YouTube URL
                                    </label>
                                    <input type="url" 
                                           class="form-control @error('youtube_url') is-invalid @enderror" 
                                           id="youtube_url" 
                                           name="youtube_url" 
                                           value="{{ old('youtube_url', $siteSetting->youtube_url) }}" 
                                           placeholder="https://youtube.com/@your-school">
                                    @error('youtube_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="linkedin_url" class="form-label">
                                        <i class="fab fa-linkedin-in me-2"></i>LinkedIn URL
                                    </label>
                                    <input type="url" 
                                           class="form-control @error('linkedin_url') is-invalid @enderror" 
                                           id="linkedin_url" 
                                           name="linkedin_url" 
                                           value="{{ old('linkedin_url', $siteSetting->linkedin_url) }}" 
                                           placeholder="https://linkedin.com/company/your-school">
                                    @error('linkedin_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Page Content Settings -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <h6 class="text-muted mb-3">Page Content Settings</h6>
                                
                                <div class="mb-3">
                                    <label for="admission_text" class="form-label">
                                        <i class="fa fa-bullhorn me-2"></i>About Page Admission Text <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('admission_text') is-invalid @enderror" 
                                           id="admission_text" 
                                           name="admission_text" 
                                           value="{{ old('admission_text', $siteSetting->admission_text) }}" 
                                           placeholder="e.g., Admissions for 2026 Intake In Progress">
                                    @error('admission_text')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        This text appears as the subtitle on the About Us page header.
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin') }}" class="btn btn-secondary">
                                        <i class="fa fa-arrow-left me-2"></i>Back to Dashboard
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update Settings
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Live preview of icon changes
document.getElementById('school_logo_icon').addEventListener('input', function(e) {
    const iconPreview = document.getElementById('icon-preview');
    const iconClass = e.target.value;
    
    // Remove all existing classes and add new ones
    iconPreview.className = '';
    iconPreview.className = 'fa ' + iconClass;
});

// Toggle between icon and image sections
document.querySelectorAll('input[name="logo_type"]').forEach(function(radio) {
    radio.addEventListener('change', function() {
        const iconSection = document.getElementById('icon-section');
        const imageSection = document.getElementById('image-section');
        
        if (this.value === 'icon') {
            iconSection.style.display = 'block';
            imageSection.style.display = 'none';
            document.getElementById('school_logo_icon').required = true;
        } else {
            iconSection.style.display = 'none';
            imageSection.style.display = 'block';
            document.getElementById('school_logo_icon').required = false;
        }
    });
});

// Image preview
document.getElementById('logo_image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // You can add image preview functionality here if needed
            console.log('Image selected:', file.name);
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection