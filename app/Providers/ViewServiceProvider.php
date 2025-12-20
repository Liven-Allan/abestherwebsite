<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ContactInfo;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share contact information with all views
        View::composer('*', function ($view) {
            $footerContactInfo = ContactInfo::getAllGrouped();
            $view->with('footerContactInfo', $footerContactInfo);
        });
    }
}
