<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Article::where('status', true)->latest()->with('category')->get()->groupBy('category.name');

        return view('pages.home.index', compact(['categories']));
    }

    public function contact()
    {
        return view('pages.home.contact');
    }

}
