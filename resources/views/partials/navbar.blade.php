<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
    <a href="{{ route('home') }}" class="navbar-brand">
        <h1 class="m-0 text-primary d-flex align-items-center">
            @if($siteSettings->isUsingImageLogo())
                <img src="{{ $siteSettings->getLogoImageUrl() }}" 
                     alt="{{ $siteSettings->school_name }}" 
                     class="me-3" 
                     style="height: 40px; width: auto;">
            @else
                <i class="fa {{ $siteSettings->school_logo_icon }} me-3"></i>
            @endif
            {{ $siteSettings->school_name }}
        </h1>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto">
            <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About Us</a>
            <a href="{{ route('fees-structure') }}" class="nav-item nav-link {{ request()->routeIs('fees-structure') ? 'active' : '' }}">Fees Structure</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                    <a href="{{ route('team') }}" class="dropdown-item">Our Staff</a>
                    <a href="{{ route('latest-news') }}" class="dropdown-item">Latest News</a>
                    <a href="{{ route('photo-gallery') }}" class="dropdown-item">Photo Gallery</a>
                </div>
            </div>
            <a href="{{ route('contact') }}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a>
        </div>
        
    </div>
</nav>
<!-- Navbar End -->