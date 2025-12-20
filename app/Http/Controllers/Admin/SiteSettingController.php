<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    /**
     * Show the form for editing site settings.
     */
    public function edit()
    {
        $siteSetting = SiteSetting::getInstance();
        return view('admin.site-setting.edit', compact('siteSetting'));
    }

    /**
     * Update site settings.
     */
    public function update(Request $request)
    {
        $request->validate([
            'school_name' => 'required|string|max:255',
            'logo_type' => 'required|in:icon,image',
            'school_logo_icon' => 'required_if:logo_type,icon|string|max:100',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url'
        ]);

        $siteSetting = SiteSetting::getInstance();
        $data = $request->all();

        // Handle logo image upload
        if ($request->hasFile('logo_image')) {
            // Create logo directory if it doesn't exist
            if (!file_exists(public_path('img/logo'))) {
                mkdir(public_path('img/logo'), 0755, true);
            }

            // Delete old logo image if exists
            if ($siteSetting->logo_image && file_exists(public_path('img/logo/' . $siteSetting->logo_image))) {
                unlink(public_path('img/logo/' . $siteSetting->logo_image));
            }

            $image = $request->file('logo_image');
            $imageName = time() . '_logo.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/logo'), $imageName);
            $data['logo_image'] = $imageName;
        }

        // If switching from image to icon, clear the image field
        if ($request->logo_type === 'icon') {
            $data['logo_image'] = null;
        }

        $siteSetting->update($data);

        return redirect()->route('admin.site-setting.edit')
                        ->with('success', 'Site settings updated successfully.');
    }
}
