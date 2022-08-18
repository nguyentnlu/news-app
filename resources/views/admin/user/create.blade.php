<x-app-layout>
@if(Gate::check('can_do', ['create user']))
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="bg-light rounded h-100 p-4">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('user.store') }}" method="POST">
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="name" class="form-label">User name</label>
                                <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" id="password" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Password confirm</label>
                                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Role</label><br>
                                @foreach($roles as $role)
                                <input id="role" type="checkbox" name="role[]" value="{{$role->id}}">
                                <label for="role">{{$role->name}}</label><br>
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">User Status</label>
                                <select name="status" id="status" style="height: 35px">
                                    <option value="1">enable</option>
                                    <option value="0">disable</option>
                                </select>
                            </div>
                            <button class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>