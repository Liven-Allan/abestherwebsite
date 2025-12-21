<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'school_name',
        'school_logo_icon',
        'logo_image',
        'logo_type',
        'facebook_url',
        'twitter_url',
        'youtube_url',
        'linkedin_url',
        'admission_text'
    ];

    // Singleton pattern - ensure only one record exists
    public static function getInstance()
    {
        $setting = self::first();
        
        if (!$setting) {
            $setting = self::create([
                'school_name' => 'Abesther Primary School',
                'school_logo_icon' => 'fa-book-reader',
                'logo_image' => null,
                'logo_type' => 'icon',
                'facebook_url' => null,
                'twitter_url' => null,
                'youtube_url' => null,
                'linkedin_url' => null,
                'admission_text' => 'Admissions for 2026 Intake In Progress'
            ]);
        }
        
        return $setting;
    }

    // Get social media links as array
    public function getSocialLinksAttribute()
    {
        return [
            'facebook' => $this->facebook_url,
            'twitter' => $this->twitter_url,
            'youtube' => $this->youtube_url,
            'linkedin' => $this->linkedin_url
        ];
    }

    // Check if social media link exists
    public function hasSocialLink($platform)
    {
        return !empty($this->{$platform . '_url'});
    }

    // Get social media icon class
    public function getSocialIcon($platform)
    {
        return match($platform) {
            'facebook' => 'fab fa-facebook-f',
            'twitter' => 'fab fa-twitter',
            'youtube' => 'fab fa-youtube',
            'linkedin' => 'fab fa-linkedin-in',
            default => 'fab fa-globe'
        };
    }

    // Check if using image logo
    public function isUsingImageLogo()
    {
        return $this->logo_type === 'image' && !empty($this->logo_image);
    }

    // Get logo image URL
    public function getLogoImageUrl()
    {
        if ($this->isUsingImageLogo()) {
            return asset('img/logo/' . $this->logo_image);
        }
        return null;
    }

    // Get logo display (either image or icon)
    public function getLogoDisplay()
    {
        if ($this->isUsingImageLogo()) {
            return '<img src="' . $this->getLogoImageUrl() . '" alt="' . $this->school_name . '" style="height: 40px; width: auto;">';
        }
        return '<i class="fa ' . $this->school_logo_icon . ' me-3"></i>';
    }
}
