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
                        <form action="{{ route('role.update', $role->id) }}" method="POST">
                            @method('PUT')
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <input readonly id="role" value="{{ $role->name}}" name="name" type="text" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Permissions</label><br>
                                @foreach($permissions as $permission)
                                <input require <?php
                                        foreach ($dataPermissions as $dataPermission) {
                                            if ($permission->id == $dataPermission->id)
                                                echo "checked";
                                        }
                                        ?> type="checkbox" id="permission" name="permission[]" value="{{$permission->id}}">
                                <label for="permission">{{$permission->name}}</label><br>
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Role Status</label>
                                <select value="{{$role->status}}" name="status" id="status" style="height: 35px">
                                    <option <?php if ($role->status == 1) {
                                                echo ("selected");
                                            } ?> value="1">Enable</option>
                                    <option <?php if ($role->status == 0) {
                                                echo ("selected");
                                            } ?> value="0">Disable</option>
                                </select>
                            </div>
                            <button class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>