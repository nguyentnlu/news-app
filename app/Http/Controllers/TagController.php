<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    protected $tag;
    protected $user;

    public function __construct()
    {
        $this->tag = new Tag();
        $this->user = new User();
    }

    public function index(){
        $this->authorize('can_do', ['read tag']);
        $tags = $this->tag->oldest()->paginate(5);
        return view('admin.tag.view', ['tags' => $tags]);
    }
    public function show(){}

    public function create(){
        $this->authorize('can_do', ['create tag']);

        return view('admin.tag.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'status' => 'required',
        ]);
        $this->tag->create($data);

        return redirect('/admin/tag');
    }

    public function edit($tag_id)
    {
        $this->authorize('can_do', ['edit tag']);
        $data = $this->tag->find($tag_id);
        return view('admin.tag.update', ['tag' => $data ]);
    }

    public function update(Request $request, $tag_id)
    {
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'status' => 'required'
        ]);

        $this->tag->find($tag_id)->fill($data)->save();

        return redirect('/admin/tag');
    }

    public function destroy($id)
    {
        $this->authorize('can_do', ['delete tag']);
        $this->tag->delete($id);
        return redirect('/admin/tag');
    }
}
