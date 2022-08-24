<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = $this->categoryList();
        $articles = Article::latest()->limit(8)->get();

        return view('pages.home.index', compact(['articles', 'categories']));
    }
    
    public function categoryList()
    {
        $categories = Category::where('status', Article::ENABLE_STATUS)->get();

        return $categories;
    }

    public function contact()
    {
        $categories = $this->categoryList();

        return view('pages.home.contact', compact('categories'));
    }

}
