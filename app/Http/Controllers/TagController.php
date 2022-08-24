<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TagController extends Controller
{
    protected $tagService;

    public function __construct()
    {
        $this->tagService = new TagService();
        date_default_timezone_set('asia/ho_chi_minh');
    }

    public function index(Request $request)
    {
        $this->authorize('can_do', ['read tag']);
        $tags = Tag::latest()->paginate(5);

        //search
        $filter = $request->query();
        if (Arr::has($filter, 'search')) {
            $tags = $this->tagService->search($filter);
        }

        return view('admin.tag.index', compact(['tags']));
    }

    public function show()
    {
        //
    }

    public function create()
    {
        $this->authorize('can_do', ['create tag']);

        return view('admin.tag.create');
    }

    public function store(StoreTagRequest $request)
    {
        $tag = $this->tagService->create($request->validated());
        if (is_null($tag)) {
            return back()->with('error', 'Failed create!');
        }

        return redirect('/admin/tag');
    }

    public function edit($tag_id)
    {
        $this->authorize('can_do', ['edit tag']);
        $data = Tag::find($tag_id);
        return view('admin.tag.edit', ['tag' => $data ]);
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $this->tagService->update($request->validated(), $tag);

        return redirect()->route('tag.index')
            ->with('message', 'Successfully updated');
    }

    public function destroy(Tag $tag)
    {
        $this->authorize('can_do', ['delete tag']);
        $this->tagService->delete($tag);
        
        return redirect()->route('tag.index')
            ->with('message', 'Successfully deleted');
    }
}
