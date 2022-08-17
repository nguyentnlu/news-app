<x-app-layout>
if(Gate::check('can_do', ['create user']))
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
                                <label for="exampleInputEmail1" class="form-label">User name</label>
                                <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <!-- <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Password confirm</label>
                                <input name="password_comfirmation" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div> -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Role</label><br>
                                @foreach($roles as $role)
                                <input type="checkbox" id="vehicle1" name="role[]" value="{{$role->id}}">
                                <label for="vehicle1">{{$role->name}}</label><br>
                                @endforeach
                                <!-- <a href="{{ route('tag.create')}}">+ Add tag</a> -->
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">User Status</label>
                                <select name="status" id="cars" style="height: 35px">
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