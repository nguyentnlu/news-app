<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
        date_default_timezone_set('asia/ho_chi_minh');
    }

    public function index(Request $request)
    {
        $this->authorize('can_do', ['read category']);
        $categories = Category::get();
        
        //search
        $filter = $request->query();
        if (Arr::has($filter, 'search')) {
            foreach (Arr::get($filter, 'search') as $column => $value) {
                $articles = Category::where($column, 'like', "%{$value}%")->get();
            }
        }

        return view('admin.category.index', compact(['categories']));
    }
    public function show()
    {
        //
    }

    public function create()
    {
        $this->authorize('can_do', ['create category']);
        $tags = Tag::all();

        return view('admin.category.create', compact(['tags']));
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = $this->categoryService->create($request->validated());
        if (is_null($category)) {
            return back()->with('error', 'Failed create!');
        }
        
        return redirect()->route('category.index')
            ->with('message', 'Successfully created');
    }

    public function edit($id)
    {
        $this->authorize('can_do', ['edit category']);
        $category = Category::find($id);
        $dataTags = $category->tags->pluck('id')->toArray();
        $tags = Tag::all();

        return view('admin.category.edit', compact(['category', 'dataTags', 'tags']));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->categoryService->update($request->validated(), $category);

        return redirect()->route('category.index')
            ->with('message', 'Successfully updated');
    }

    public function destroy(Category $category)
    {
        $this->authorize('can_do', ['delete category']);
        $this->categoryService->delete($category);

        return redirect()->route('category.index')
            ->with('message', 'Successfully deleted');
    }
}
