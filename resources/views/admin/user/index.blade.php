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
                                    <div class="row">
                                        @if(Gate::check('can_do', ['create user']))
                                        <div class="col-sm-6 d-flex justify-content-start">
                                            <a href="{{ route('user.create')}}" 
                                                class="btn btn-primary col-2"
                                                >
                                                Create
                                            </a>
                                        </div>
                                        @endif
                                        <x-forms.search value="{{ $search ?? '' }}" />
                                    </div>
                                    <br />
                                    @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                    @endif
                                    <div class="table-responsive">
                                        <table id="table" class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Birthday</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Created at</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $user)
                                                @if(($user->is_admin) != 1)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->birthday }}</td>
                                                    <td>{{ $user->phone }}</td>
                                                    <td>{{ $user->address }}</td>
                                                    <td>
                                                        @if ($user->status == 0) Disable @else Enable @endif
                                                    </td>
                                                    <td>{{$user['created_at']}}</td>
                                                    <td>
                                                        <form class="d-flex justify-content-end"
                                                            action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            @if(Gate::check('can_do', ['edit user']))
                                                                <a class="btn btn-warning" 
                                                                    style="display:inline"
                                                                    href="{{ route('user.edit', $user->id)}}"
                                                                    >
                                                                    <i class="fa fa-pencil-square-o" 
                                                                        aria-hidden="true">
                                                                    </i>
                                                                </a>|
                                                            @endif
                                                            @if(Gate::check('can_do', ['delete user']))
                                                                <button style="display:inline"
                                                                    onclick="return confirm('Are you sure you want to delete this user?')"
                                                                    class="btn btn-danger"
                                                                    >
                                                                    <i class="fa fa-trash-o" 
                                                                        aria-hidden="true">
                                                                    </i>
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
                                    <div class="py-8">
                                        {{ $users->appends(request()->query())->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <x-slot name="scripts">
        <script>
            $(document).ready(function () {
                $('#table').DataTable({
                    "pagingType": "input",
                    paging: false,
                    info: false,
                    "searching": false
                });
            });
        </script>
    </x-slot>
</x-app-layout>