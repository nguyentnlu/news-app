<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index($id)
    {
        $categories = $this->categoryList();
        $category = Category::find($id);
        $articles = Article::where('category_id', $id)->latest()->get();
        $tags = $category->tags()->where('status', Article::ENABLE_STATUS)->get();

        return view('pages.article.index', compact(['articles', 'categories', 'tags', 'category']));
    }

    public function categoryList()
    {
        $categories = Category::where('status', Article::ENABLE_STATUS)->get();

        return $categories;
    }

    public function show($id)
    {
        $categories = $this->categoryList();
        $article = Article::find($id);
        $tags = $article->tags()->where('status', Article::ENABLE_STATUS)->get();
        $articles = Article::all();
        
        return view('pages.article.show', compact(['article', 'tags', 'articles', 'categories']));
    }

    public function articleForTag($id)
    {
        $categories = $this->categoryList();
        $tag = Tag::find($id);
        $articles = $tag->articles()->get();

        return view('pages.article.index', compact(['articles', 'categories', 'tag']));
    }
    
    public function search(Request $request)
    {
        $categories = $this->categoryList();
        $keyword = $request->search;
        $articles = Article::where('title', 'like', "%{$keyword}%")->get();

        return view('pages.article.index', compact(['articles', 'categories']));
    }

    public function tag()
    {
        $categories = $this->categoryList();
        $tags = Tag::get();

        return view('pages.article.tag', compact('tags', 'categories'));
    }
}
