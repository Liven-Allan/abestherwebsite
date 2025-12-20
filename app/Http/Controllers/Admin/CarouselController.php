<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousel;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carousels = Carousel::ordered()->get();
        return view('admin.carousel.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_text' => 'required|string|max:255',
            'second_text' => 'required|string|max:255',
            'third_text' => 'required|string',
            'background_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'required|integer|min:0'
        ]);

        $data = $request->only(['first_text', 'second_text', 'third_text', 'sort_order']);
        
        // Handle checkbox for is_active
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        
        // Handle image upload
        if ($request->hasFile('background_image')) {
            $image = $request->file('background_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
            $data['background_image'] = 'img/' . $imageName;
        }

        Carousel::create($data);

        return redirect()->route('admin.carousel.index')->with('success', 'Carousel slide created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carousel $carousel)
    {
        return view('admin.carousel.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carousel $carousel)
    {
        $request->validate([
            'first_text' => 'required|string|max:255',
            'second_text' => 'required|string|max:255',
            'third_text' => 'required|string',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'required|integer|min:0'
        ]);

        $data = $request->only(['first_text', 'second_text', 'third_text', 'sort_order']);
        
        // Handle checkbox for is_active
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        
        // Handle image upload
        if ($request->hasFile('background_image')) {
            // Delete old image if exists
            if ($carousel->background_image && file_exists(public_path($carousel->background_image))) {
                unlink(public_path($carousel->background_image));
            }
            
            $image = $request->file('background_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
            $data['background_image'] = 'img/' . $imageName;
        }

        $carousel->update($data);

        return redirect()->route('admin.carousel.index')->with('success', 'Carousel slide updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carousel $carousel)
    {
        // Delete image file if exists
        if ($carousel->background_image && file_exists(public_path($carousel->background_image))) {
            unlink(public_path($carousel->background_image));
        }

        $carousel->delete();

        return redirect()->route('admin.carousel.index')->with('success', 'Carousel slide deleted successfully!');
    }
}
