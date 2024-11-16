<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class HomeController extends Controller
{
    public function home()
{
    // Fetch the latest banner or any specific logic
    $banner = Banner::latest()->first();

    // Pass the banner data to the view
    return view('home', compact('banner'));
}
}
