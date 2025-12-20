<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LatestNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LatestNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = LatestNews::orderBy('published_date', 'desc')->paginate(10);
        return view('admin.latest-news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.latest-news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_date' => 'required|date',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img/news'), $imageName);
            $data['image'] = $imageName;
        }

        LatestNews::create($data);

        return redirect()->route('admin.latest-news.index')
                        ->with('success', 'News created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LatestNews $latestNews)
    {
        return view('admin.latest-news.show', compact('latestNews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LatestNews $latestNews)
    {
        return view('admin.latest-news.edit', compact('latestNews'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LatestNews $latestNews)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_date' => 'required|date',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($latestNews->image && file_exists(public_path('img/news/' . $latestNews->image))) {
                unlink(public_path('img/news/' . $latestNews->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img/news'), $imageName);
            $data['image'] = $imageName;
        }

        $latestNews->update($data);

        return redirect()->route('admin.latest-news.index')
                        ->with('success', 'News updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LatestNews $latestNews)
    {
        // Delete image if exists
        if ($latestNews->image && file_exists(public_path('img/news/' . $latestNews->image))) {
            unlink(public_path('img/news/' . $latestNews->image));
        }

        $latestNews->delete();

        return redirect()->route('admin.latest-news.index')
                        ->with('success', 'News deleted successfully.');
    }
}
