<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function show($slug)
    {
        $page = collect(config('slugs'))->firstWhere('slug', $slug);

        return view('home', compact('page'));
    }
}
