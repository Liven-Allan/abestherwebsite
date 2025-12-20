<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhotoGallery;

class PhotoGalleryController extends Controller
{
    public function index()
    {
        // Get all active photos ordered by sort_order
        $photos = PhotoGallery::active()->ordered()->get();
        
        return view('photo_gallery', compact('photos'));
    }
}
