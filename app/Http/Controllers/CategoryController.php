<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CategoryController extends Controller
{
    protected $category;
    protected $tag;
    protected $article;
    protected $user;

    public function __construct()
    {
        $this->category = new Category();
        $this->tag = new Tag();
        $this->article = new Article();
        $this->user = new User();

    }

    public function index()
    {
        $this->authorize('can_do', ['read category']);
        $categories = $this->category->oldest()->paginate(5);

        return view('admin.category.index', ['categories' => $categories]);
    }
    public function show()
    {
    }

    public function create()
    {
        $this->authorize('can_do', ['create category']);
        $tags = $this->tag->all();

        return view('admin.category.create', ['tags' => $tags]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'tag' => 'nullable|array'
        ]);
        
        $dataAdded = $this->category->create($data);
        if (isset($data['tag'])) {
            $dataAdded->tags()->sync(Arr::get($data, 'tag', []));
        }
        
        return redirect()->route('category.index')
            ->with('message', 'Successfully created');
    }

    public function edit($id)
    {
        $this->authorize('can_do', ['edit category']);
        $data = $this->category->find($id);
        $dataTags = $data->tags->pluck('id')->toArray();
        $tags = $this->tag->all();

        return view('admin.category.edit', ['category' => $data, 'dataTags' => $dataTags, 'tags' => $tags]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'tag' => 'nullable|array'
        ]);
        $dataUpdate = $this->category->find($id);
        $dataUpdate->fill($data)->save();

        if (isset($data['tag'])) {
            $dataUpdate->tags()->sync(Arr::get($data, 'tag', []));
        }

        return redirect()->route('category.index')
            ->with('message', 'Successfully updated');
    }

    public function destroy(Category $category)
    {
        $this->authorize('can_do', ['delete category']);
        $category->tags()->detach();
        $this->article->where('category_id', $category['id'])->delete();

        $category->delete();

        return redirect()->route('category.index')
            ->with('message', 'Successfully deleted');
    }
}
