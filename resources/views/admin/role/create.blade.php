<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role') }}
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
                        <form action="{{ route('role.store') }}" method="POST">
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="role" class="form-label">Role name</label>
                                <input name="name" type="text" class="form-control" id="role" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Permissions</label><br>
                                @foreach($permissions as $permission)
                                <input type="checkbox" id="vehicle1" name="permission[]" value="{{$permission->id}}">
                                <label for="vehicle1">{{$permission->name}}</label><br>
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Role Status</label>
                                <select id="status" name="status" id="cars" style="height: 35px">
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
</x-app-layout>