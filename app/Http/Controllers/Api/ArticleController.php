<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }
    public function getArticlesByCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $articles = Article::where('category_id', $category->id)
            ->where('status', Article::ENABLE_STATUS)
            ->get();
        // $tags = $category->tags()->where('status', Article::ENABLE_STATUS)->get();

        return $articles->toArray();
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $tags = $article->tags()->where('status', Article::ENABLE_STATUS)->get();
        $articles = Article::all();
        
        return $article->toArray();
    }

    public function getArticlesByTag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $articles = $tag->articles()->where('status', Article::ENABLE_STATUS)->latest()->paginate(10);

        return view('pages.article.index', compact(['articles', 'tag']));
    }
    
    public function searchArticles(Request $request)
    {
        $filter = [
            ...$request->query(),
            'paginate' => 10,
        ];
        $articles = $this->articleService->getList($filter);

        return view('pages.article.index', compact(['articles']))->with('search', $filter['search'] ?? '');
    }

    public function tag()
    {
        $tags = Tag::get();

        return view('pages.article.tag', compact('tags'));
    }
}
