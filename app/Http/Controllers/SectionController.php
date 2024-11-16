<?php

namespace App\Http\Controllers;

use App\Models\Overview;
use App\Models\Pointer;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    // Fetch data for display
    public function index()
    {
        $overviews = Overview::all();
        $pointers = Pointer::all();
        return view('sections.index', compact('overviews', 'pointers'));
    }

    // Create Overview
    public function createOverview(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('overviews', 'public');
        }

        Overview::create($data);
        return redirect()->back()->with('success', 'Overview added successfully.');
    }

    // Create Pointer
    public function createPointer(Request $request)
    {
        $data = $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg',
            'description' => 'required|string',
        ]);

        // Handle file upload
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('pointers', 'public');
        }

        Pointer::create($data);
        return redirect()->back()->with('success', 'Pointer added successfully.');
    }

    // Delete Overview
    public function deleteOverview($id)
    {
        $overview = Overview::findOrFail($id);
        if (file_exists(storage_path('app/public/' . $overview->image))) {
            unlink(storage_path('app/public/' . $overview->image));
        }
        $overview->delete();
        return redirect()->back()->with('success', 'Overview deleted successfully.');
    }

    // Delete Pointer
    public function deletePointer($id)
    {
        $pointer = Pointer::findOrFail($id);
        if (file_exists(storage_path('app/public/' . $pointer->logo))) {
            unlink(storage_path('app/public/' . $pointer->logo));
        }
        $pointer->delete();
        return redirect()->back()->with('success', 'Pointer deleted successfully.');
    }
}
