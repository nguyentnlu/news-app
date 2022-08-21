<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $role;
    protected $permission;
    protected $user;

    public function __construct()
    {
        $this->role = new Role();
        $this->permission = new Permission();
        $this->user = new User();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('can_do', ['read role']);
        $roles = $this->role->all();

        return view('admin.role.index', ['roles' => $roles]);
    }

    /**
     * Disable/Enable role status
     */
    public function setStatus($id)
    {
        $this->authorize('can_do', ['enable role']);
        $role = Role::find($id);
        $role->status = !($role->status);
        $role->save();

        $message = 'Successfully change ' . $role->name . ' status!';

        return redirect()->route('role.index')
            ->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('can_do', ['create role']);
        $permissions = $this->permission->all();

        return view('admin.role.create', ['permissions' => $permissions]);
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
            'status' => 'required',
            'permission' => ['required', 'array'],
        ]);

        $dataAdded = $this->role->create($data);
        $dataAdded->permissions()->sync($data['permission']);

        return redirect()->route('role.index')
            ->with('message', 'Successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('can_do', ['edit role']);
        $data = $this->role->find($id);
        $dataPermissions = $data->permissions->pluck('id')->toArray();
        $permissions = $this->permission->all();

        return view('admin.role.edit', ['role' => $data, 'dataPermissions' => $dataPermissions, 'permissions' => $permissions]);
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
            'name' => 'required',
            'status' => 'required',
            'permission' => ['required', 'array'],
        ]);

        $dataUpdate = $this->role->find($id);
        $dataUpdate->fill($data)->save();
        $dataUpdate->permissions()->sync($data['permission']);

        return redirect()->route('role.index')
            ->with('message', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->permissions()->detach();
        $role->delete();

        return redirect()->route('role.index')
            ->with('message', 'Successfully deleted');
    }

}
