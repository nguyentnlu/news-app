<x-app-layout>
    @if(Gate::check('can_do', ['read role']))
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Role') }}
            </h2>
        </x-slot>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="container-fluid pt-4 px-4">
                            <div class="row g-4">
                                <div class="col-12">
                                    @if(Gate::check('can_do', ['create role']))
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('role.create')}}" class="btn btn-primary col-2">Create</a>
                                    </div>
                                    @endif
                                    <br />
                                    @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                    @endif
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Role</th>
                                                    <th scope="col">Created at</th>
                                                    <th scope="col">Updated at</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($roles as $role)
                                                    @if(($role->id) != 1)
                                                        <tr>
                                                            <td>{{ $role->id }}</td>
                                                            <td>{{ $role->name }}</td>
                                                            <td>{{ $role->created_at }}</td>
                                                            <td>{{ $role->updated_at }}</td>
                                                            <td>
                                                                @if ($role->status == 0) 
                                                                    Disable 
                                                                @else 
                                                                    Enable 
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <form class="d-flex justify-content-end" 
                                                                    action="{{ route('role.destroy', $role->id) }}" 
                                                                    method="POST"
                                                                    >
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    @if(Gate::check('can_do', ['edit role']))
                                                                        <a class="btn btn-success" 
                                                                            style="display:inline" 
                                                                            href="{{ route('role.edit', $role->id)}}"
                                                                            >
                                                                            Edit
                                                                        </a>|
                                                                    @endif
                                                                    @if(Gate::check('can_do', ['delete role']))
                                                                        <button style="display:inline" 
                                                                            onclick="return confirm('Are you sure you want to delete this role?')" 
                                                                            class="btn btn-warning"
                                                                            >
                                                                            Delete
                                                                        </button>
                                                                    @endif
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>