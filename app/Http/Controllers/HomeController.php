<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $count = Course::count();

        return view('home', [
            "disableContainer" => true,
            "newTuts" => Course::orderByDesc('created_at')->take(3)->get(),
            "featured" => Course::skip(mt_rand(0, max(0, $count - 3)))->take(3)->get() || [],
            "count" => $count
        ]);
    }

    public function getContact()
    {
        return view("contact-form");
    }
}
