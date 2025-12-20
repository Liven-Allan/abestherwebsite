<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS URLs in production
        if (config('app.env') === 'production') {
            \Illuminate\Support\Facades\URL::forceScheme('https');
            
            // Force secure cookies and sessions for HTTPS
            config(['session.secure' => true]);
            config(['session.same_site' => 'none']);
        }

        // Share contact information, site settings and page header image with all views
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            $footerContactInfo = \App\Models\ContactInfo::getAllGrouped();
            $siteSettings = \App\Models\SiteSetting::getInstance();
            
            // Get first active carousel image for page headers
            $pageHeaderImage = \App\Models\Carousel::active()->first();
            $headerBackgroundImage = $pageHeaderImage ? asset($pageHeaderImage->background_image) : asset('img/carousel-1.jpg');
            
            $view->with('footerContactInfo', $footerContactInfo);
            $view->with('siteSettings', $siteSettings);
            $view->with('headerBackgroundImage', $headerBackgroundImage);
        });
    }
}
