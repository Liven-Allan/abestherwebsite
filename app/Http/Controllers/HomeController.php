<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;

class HomeController extends Controller
{
    public function index()
    {
        // Get all active carousel slides ordered by sort_order
        $carousels = Carousel::active()->ordered()->get();
        
        // Get about section data
        $aboutSection = \App\Models\AboutSection::getInstance();
        
        // Get core pillars data
        $corePillars = \App\Models\CorePillar::active()->ordered()->get();
        
        // Get latest news (3 most recent active news items)
        $latestNews = \App\Models\LatestNews::active()->recent(3)->get();
        
        return view('home', compact('carousels', 'aboutSection', 'corePillars', 'latestNews'));
    }
}
