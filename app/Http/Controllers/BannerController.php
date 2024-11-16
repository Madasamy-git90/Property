<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    // Display a list of banners
    public function index()
    {
        $banners = Banner::all();
        return view('banners.index', compact('banners'));
    }

    // Show the form to create a new banner
    public function create()
    {
        return view('banners.create');
    }

    // Store a new banner in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:4096',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('banners', 'public');
        }

        Banner::create($validated);

        return redirect()->route('banner.index')->with('success', 'Banner created successfully.');
    }

    // Show a single banner
    public function show(Banner $banner)
    {
        return view('banners.show', compact('banner'));
    }

    // Show the form to edit a banner
    public function edit(Banner $banner)
    {
        return view('banners.edit', compact('banner'));
    }

    // Update an existing banner
    public function update(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($banner->image) {
                Storage::disk('public')->delete($banner->image);
            }
            $validated['image'] = $request->file('image')->store('banners', 'public');
        }

        $banner->update($validated);

        return redirect()->route('banner.index')->with('success', 'Banner updated successfully.');
    }

    // Delete a banner
    public function destroy(Banner $banner)
    {
        if ($banner->image) {
            Storage::disk('public')->delete($banner->image);
        }

        $banner->delete();

        return redirect()->route('banner.index')->with('success', 'Banner deleted successfully.');
    }
}
