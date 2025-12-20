<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutSection;

class AboutSectionController extends Controller
{
    public function edit()
    {
        $aboutSection = AboutSection::getInstance();
        return view('admin.about-section.edit', compact('aboutSection'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $aboutSection = AboutSection::getInstance();
        $data = $request->only(['title', 'description']);

        // Handle image uploads
        foreach (['image_1', 'image_2', 'image_3'] as $imageField) {
            if ($request->hasFile($imageField)) {
                // Delete old image if exists
                if ($aboutSection->$imageField && file_exists(public_path($aboutSection->$imageField))) {
                    unlink(public_path($aboutSection->$imageField));
                }
                
                $image = $request->file($imageField);
                $imageName = time() . '_' . $imageField . '_' . $image->getClientOriginalName();
                $image->move(public_path('img'), $imageName);
                $data[$imageField] = 'img/' . $imageName;
            }
        }

        $aboutSection->update($data);

        return redirect()->route('admin.about-section.edit')->with('success', 'About section updated successfully!');
    }
}
