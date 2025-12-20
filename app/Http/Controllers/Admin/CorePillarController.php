<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CorePillar;

class CorePillarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $corePillars = CorePillar::ordered()->get();
        $canAddMore = $corePillars->count() < 4;
        
        return view('admin.core-pillar.index', compact('corePillars', 'canAddMore'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Check if we already have 4 pillars
        if (CorePillar::count() >= 4) {
            return redirect()->route('admin.core-pillar.index')
                ->with('error', 'Maximum of 4 core pillars allowed. Please delete one to add a new pillar.');
        }
        
        return view('admin.core-pillar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check limit before creating
        if (CorePillar::count() >= 4) {
            return redirect()->route('admin.core-pillar.index')
                ->with('error', 'Maximum of 4 core pillars allowed.');
        }

        $request->validate([
            'icon' => 'required|string|max:255',
            'icon_color' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'sort_order' => 'required|integer|min:0'
        ]);

        $data = $request->only(['icon', 'icon_color', 'title', 'description', 'sort_order']);
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        CorePillar::create($data);

        return redirect()->route('admin.core-pillar.index')->with('success', 'Core pillar created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CorePillar $corePillar)
    {
        return view('admin.core-pillar.edit', compact('corePillar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CorePillar $corePillar)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'icon_color' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'sort_order' => 'required|integer|min:0'
        ]);

        $data = $request->only(['icon', 'icon_color', 'title', 'description', 'sort_order']);
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $corePillar->update($data);

        return redirect()->route('admin.core-pillar.index')->with('success', 'Core pillar updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CorePillar $corePillar)
    {
        $corePillar->delete();

        return redirect()->route('admin.core-pillar.index')->with('success', 'Core pillar deleted successfully!');
    }
}
