<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = PhotoGallery::ordered()->paginate(12);
        return view('admin.photo-gallery.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.photo-gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? true : false;

        // Create gallery directory if it doesn't exist
        if (!file_exists(public_path('img/gallery'))) {
            mkdir(public_path('img/gallery'), 0755, true);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img/gallery'), $imageName);
            $data['image'] = $imageName;
        }

        PhotoGallery::create($data);

        return redirect()->route('admin.photo-gallery.index')
                        ->with('success', 'Photo added to gallery successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PhotoGallery $photoGallery)
    {
        return view('admin.photo-gallery.show', compact('photoGallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhotoGallery $photoGallery)
    {
        return view('admin.photo-gallery.edit', compact('photoGallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhotoGallery $photoGallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($photoGallery->image && file_exists(public_path('img/gallery/' . $photoGallery->image))) {
                unlink(public_path('img/gallery/' . $photoGallery->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img/gallery'), $imageName);
            $data['image'] = $imageName;
        }

        $photoGallery->update($data);

        return redirect()->route('admin.photo-gallery.index')
                        ->with('success', 'Photo updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotoGallery $photoGallery)
    {
        // Delete image if exists
        if ($photoGallery->image && file_exists(public_path('img/gallery/' . $photoGallery->image))) {
            unlink(public_path('img/gallery/' . $photoGallery->image));
        }

        $photoGallery->delete();

        return redirect()->route('admin.photo-gallery.index')
                        ->with('success', 'Photo deleted successfully.');
    }
}
