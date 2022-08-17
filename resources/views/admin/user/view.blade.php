<x-app-layout>
@if(Gate::check('can_do', ['read user']))

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container-fluid pt-4 px-4">
                        <div class="row g-4">

                            <div class="col-12">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('user.create')}}" class="btn btn-primary col-2">Create</a>
                                </div>
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
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Created at</th>
                                                <th scope="col">Updated at</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <?php
                                                    if ($user->status == 0)
                                                        echo "Disable";
                                                    else
                                                        echo "Enable";
                                                    ?>
                                                </td>
                                                <td>{{$user['created_at']}}</td>
                                                <td>{{$user['updated_at']}}</td>
                                                <td>
                                                    <form class="d-flex justify-content-end" action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                        @method('DELETE')
                                                        {{csrf_field()}}
                                                        <a class="btn btn-success" style="display:inline" href="{{ route('user.edit', $user->id)}}">Edit</a>|
                                                        <button style="display:inline" onclick="return confirm('Are you sure you want to delete this user?')" class="btn btn-warning">Delete</button>
                                                    </form>

                                                </td>
                                            </tr>
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