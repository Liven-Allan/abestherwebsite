<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LatestNews;

class LatestNewsController extends Controller
{
    public function index()
    {
        // Get all active news items ordered by published date (most recent first)
        $latestNews = LatestNews::active()->orderBy('published_date', 'desc')->get();
        
        return view('latest_news', compact('latestNews'));
    }
}
