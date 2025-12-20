<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5 justify-content-center">
            <div class="col-lg-4 col-md-6">
                <h3 class="text-white mb-4">Get In Touch</h3>
                
                @if(isset($footerContactInfo['address']) && $footerContactInfo['address']->count() > 0)
                    @foreach($footerContactInfo['address']->take(1) as $address)
                        <p class="mb-2"><i class="fa {{ $address->icon }} me-3"></i>{{ $address->value }}</p>
                    @endforeach
                @else
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Address not available</p>
                @endif
                
                @if(isset($footerContactInfo['phone']) && $footerContactInfo['phone']->count() > 0)
                    @foreach($footerContactInfo['phone']->take(1) as $phone)
                        <p class="mb-2"><i class="fa {{ $phone->icon }} me-3"></i>{{ $phone->value }}</p>
                    @endforeach
                @else
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>Phone not available</p>
                @endif
                
                @if(isset($footerContactInfo['email']) && $footerContactInfo['email']->count() > 0)
                    @foreach($footerContactInfo['email']->take(1) as $email)
                        <p class="mb-2"><i class="fa {{ $email->icon }} me-3"></i>{{ $email->value }}</p>
                    @endforeach
                @else
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>Email not available</p>
                @endif
                
                <div class="d-flex pt-2">
                    @if($siteSettings->hasSocialLink('twitter'))
                        <a class="btn btn-outline-light btn-social" href="{{ $siteSettings->twitter_url }}" target="_blank">
                            <i class="{{ $siteSettings->getSocialIcon('twitter') }}"></i>
                        </a>
                    @endif
                    
                    @if($siteSettings->hasSocialLink('facebook'))
                        <a class="btn btn-outline-light btn-social" href="{{ $siteSettings->facebook_url }}" target="_blank">
                            <i class="{{ $siteSettings->getSocialIcon('facebook') }}"></i>
                        </a>
                    @endif
                    
                    @if($siteSettings->hasSocialLink('youtube'))
                        <a class="btn btn-outline-light btn-social" href="{{ $siteSettings->youtube_url }}" target="_blank">
                            <i class="{{ $siteSettings->getSocialIcon('youtube') }}"></i>
                        </a>
                    @endif
                    
                    @if($siteSettings->hasSocialLink('linkedin'))
                        <a class="btn btn-outline-light btn-social" href="{{ $siteSettings->linkedin_url }}" target="_blank">
                            <i class="{{ $siteSettings->getSocialIcon('linkedin') }}"></i>
                        </a>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <h3 class="text-white mb-4">Quick Links</h3>
                <a class="btn btn-link text-white-50" href="{{ route('home') }}">Home</a>
                <a class="btn btn-link text-white-50" href="{{ route('about') }}">About Us</a>
                <a class="btn btn-link text-white-50" href="{{ route('fees-structure') }}">Fees Structure</a>
                <a class="btn btn-link text-white-50" href="{{ route('team') }}">Our Staff</a>
                <a class="btn btn-link text-white-50" href="{{ route('latest-news') }}">Latest News</a>
                <a class="btn btn-link text-white-50" href="{{ route('contact') }}">Contact Us</a>
                <a class="btn btn-link text-white-50" href="{{ route('login') }}">Login</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Abesther Primary School</a>, All Right Reserved. 
                    
                    <!--/*** This template is free as long as you keep the footer author's credit link/attribution link/backlink. If you'd like to use the template without the footer author's credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!-- Footer menu removed as requested -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->