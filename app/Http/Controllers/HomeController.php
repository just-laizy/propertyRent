<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Adjust as per your User model namespace

class HomeController extends Controller
{
    public function index()
    {
        // Example: Load properties to display on the home page
        $properties = Property::latest()->take(6)->get();

        return view('home', compact('properties'));
    }

    public function profile()
    {
        // Example: Load user's profile data
        $user = auth()->user();

        return view('profile', compact('user'));
    }
}
