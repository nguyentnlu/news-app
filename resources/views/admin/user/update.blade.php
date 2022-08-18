<x-app-layout>
    @if(Gate::check('can_do', ['edit user']))
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
                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @method('PUT')
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="name" class="form-label">User name</label>
                                <input id="name" readonly value="{{ $user->name}}" name="name" type="text" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">User email</label>
                                <input id="email" readonly value="{{ $user->email}}" name="email" type="text" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Roles</label><br>
                                @foreach($roles as $role)
                                <input <?php
                                        foreach ($dataRoles as $dataRole) {
                                            if ($role->id == $dataRole->id)
                                                echo "checked";
                                        }
                                        ?> type="checkbox" id="role" name="role[]" value="{{$role->id}}">
                                <label for="role">{{$role->name}}</label><br>
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">User Status</label>
                                <select value="{{$user->status}}" name="status" id="status" style="height: 35px">
                                    <option <?php if ($user->status == 0) {
                                                echo ("selected");
                                            } ?> value="0">disable</option>
                                    <option <?php if ($user->status == 1) {
                                                echo ("selected");
                                            } ?> value="1">enable</option>
                                </select>
                            </div>
                            <button class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>