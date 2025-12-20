<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactInfo;

class ContactController extends Controller
{
    public function index()
    {
        // Get all contact information grouped by type
        $contactInfos = ContactInfo::getAllGrouped();
        
        return view('contact', compact('contactInfos'));
    }
}
