<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
        date_default_timezone_set('asia/ho_chi_minh');
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('can_do', ['read article']);

        if (Gate::check('can_do', ['enable article'])) {
            $filter = [
                ...$request->query(),
                'paginate' => 10,
            ];
        } else {
            $filter = [
                ...$request->query(),
                'filter' => [
                    ...$request->query('filter', []),
                    'created_by' => auth()->id(),
                ],
                'paginate' => 10,

            ];
        }

        $articles = $this->articleService->getList($filter);

        return view('admin.article.index', compact('articles'))->with('search', $filter['search'] ?? '');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('can_do', ['read article']);

        $article = Article::find($id);
        $dataTags = $article->tags()->where('status', Article::ENABLE_STATUS)->get();
        $category = Category::all();

        return view('admin.article.show', compact(['article', 'category', 'dataTags']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('can_do', ['create article']);

        $category = Category::where('status', Article::ENABLE_STATUS)->get();
        $tags = Tag::where('status', Article::ENABLE_STATUS)->get();

        return view('admin.article.create', compact(['category', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $article = $this->articleService->create($request->validated());

        if (is_null($article)) {
            return back()->with('error', 'Failed create!');
        }

        return redirect()->route('article.index')
            ->with('message', 'Successfully created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('can_do', ['edit article']);
        
        $article = Article::find($id);
        $dataTags = $article->tags->pluck('id')->toArray();

        $category = Category::all();
        $tags = Tag::where('status', Article::ENABLE_STATUS)->get();

        return view('admin.article.edit', compact(['article', 'category', 'dataTags', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest $request
     * @param  \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $this->articleService->update($request->validated(), $article);

        return redirect()->route('article.index')
            ->with('message', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $this->authorize('can_do', ['delete article']);
        $this->articleService->delete($article);

        return redirect()->route('article.index')
            ->with('message', 'Successfully deleted');
    }

    /**
     * Disable/Enable role status
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function setStatus($id)
    {
        $this->authorize('can_do', ['enable article']);
        $message = $this->articleService->setStatus($id);

        return redirect()->route('article.index')
            ->with('message', $message);
    }
}
