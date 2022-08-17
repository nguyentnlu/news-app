<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $user;
    protected $role;

    public function __construct()
    {
        $this->user = new User();
        $this->role = new Role();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('can_do', ['read user']);
        $users = $this->user->latest()->paginate(5);
        return view('admin.user.view', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('can_do', ['create user']);
        $roles = $this->role->all();

        return view('admin.user.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required',
            'role' => ['required', 'array']
        ]);

        $dataAdded = $this->user->create($data);
        $dataAdded->roles()->sync($data['role']);

        return redirect()->route('user.index')
            ->with('message', 'Successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('can_do', ['edit user']);
        $data = $this->user->find($id);
        $dataRoles = $data->roles()->get();
        
        $roles = $this->role->all();

        return view('admin.user.update', ['user' => $data, 'roles' => $roles, 'dataRoles' => $dataRoles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'status' => 'required',
            'role' => ['required', 'array']
        ]);

        $this->user->find($id)->fill($data)->save();

        $dataUpdate = $this->user->find($id);
        $dataUpdate->roles()->sync($data['role']);

        return redirect()->route('user.index')
            ->with('message', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    /**
     * Disable/Enable role status
     */
    // public function setStatus($id)
    // {
    //     $this->authorize('can_do', ['enable user']);
    //     $user = User::find($id);
    //     $user->status = !($user->status);
    //     $user->save();

    //     $message = 'Successfully change ' . $user->name . ' status!';

    //     return redirect()->route('user.index')
    //         ->with('message', $message);
    // }
}
