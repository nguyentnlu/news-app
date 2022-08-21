<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    protected $user;
    protected $article;
    protected $tag;
    protected $category;

    public function __construct()
    {
        $this->article = new Article();
        $this->category = new Category();
        $this->tag = new Tag();
        $this->user = new User();
    }

    public function index()
    {
        $this->authorize('can_do', ['read article']);
        $articles = $this->article->with(['author', 'category'])->latest()->paginate(5);

        return view('admin.article.index', compact('articles'));
    }

    public function show($id)
    {
        $this->authorize('can_do', ['read article']);
        $data = $this->article->find($id);
        $dataTags = $data->tags()->where('status', Article::ENABLE_STATUS)->get();

        $category = $this->category->all();

        return view('admin.article.show', ['article' => $data, 'category' => $category, 'dataTags' => $dataTags]);
    }

    public function create()
    {
        $this->authorize('can_do', ['create article']);
        $category = $this->category->where('status', Article::ENABLE_STATUS)->get();
        $tags = $this->tag->where('status', Article::ENABLE_STATUS)->get();

        return view('admin.article.create', ['category' => $category, 'tags' => $tags]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:articles|max:255',
            'content' => 'required',
            'slug' => 'required',
            'url' => ['required', 'file', 'max:512'],
            'category_id' => 'required',
            'tag' => 'nullable|array',
        ]);

        $fileName = $this->handleFileUpload($request);
        $data['url'] = $fileName;

        $data['created_by'] =  auth()->user()->id;
        $data['status'] = false;
        $article = $this->article->create($data);

        $article->tags()->sync(Arr::get($data, 'tag', []));

        return redirect()->route('article.index')
            ->with('message', 'Successfully created. Please wait for confirmation!');
    }

    public function edit($id)
    {
        // $this->authorize('can_do', ['edit article']);
        $data = $this->article->find($id);
        $dataTags = $data->tags->pluck('id')->toArray();
            
        $category = $this->category->all();
        $tags = $this->tag->where('status', Article::ENABLE_STATUS)->get();

        return view('admin.article.edit', ['article' => $data, 'category' => $category, 'dataTags' => $dataTags, 'tags' => $tags]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required',
            'url' => ['nullable', 'file', 'max:512'],
            'category_id' => 'required',
            'tag' => 'nullable|array',
        ]);

        $fileName = $this->handleFileUpload($request);
        $article = $this->article->find($id);

        if (empty($fileName)) {
            $data['url'] = $article->url;
        } else {
            $filePath = public_path('storage/' . $article->url);
            if (File::exists($filePath)) {
                unlink($filePath);
            }
            $data['url'] = $fileName;
        }

        $article->fill($data)->save();

        $article->tags()->sync(Arr::get($data, 'tag', []));

        return redirect()->route('article.index')
            ->with('message', 'Successfully updated');
    }

    public function handleFileUpload(Request $request)
    {
        if ($request->hasFile('url')) {
            $file = $request->file('url');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $request->file('url')->storeAs('public', $fileName);
            return $fileName;
        }
        return '';
    }

    public function destroy(Article $article)
    {
        $this->authorize('can_do', ['delete article']);
        $article->tags()->detach();
        $article->delete();

        return redirect()->route('article.index')
            ->with('message', 'Successfully deleted');
    }

    /**
     * Disable/Enable role status
     */
    public function setStatus($id)
    {
        $this->authorize('can_do', ['enable article']);
        $article = Article::find($id);
        $article->status = !($article->status);
        $article->save();

        $message = 'Successfully change "' . $article->title . '" status!';

        return redirect()->route('article.index')
            ->with('message', $message);
    }
}
