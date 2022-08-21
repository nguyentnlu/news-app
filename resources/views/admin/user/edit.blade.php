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
                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <x-forms.input label="Name" name="name" id="name" value="{{ $user->name }}"/>
                            </div>
                            <div class="mb-3">
                                <x-forms.input label="Email" name="email" id="email" value="{{ $user->email }}"/>
                                </div>
                            <div class="mb-3">
                                <x-forms.input label="Birthday" name="name" id="name" value="{{ $user->name }}" type="date"/>
                            </div>
                            <div class="mb-3">
                                <x-forms.input label="Phone" name="phone" id="phone" value="{{ $user->phone }}"/>
                            </div>
                            <div class="mb-3">
                                <x-forms.input label="Address" name="address" id="address" value="{{ $user->address }}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Roles</label><br>
                                <x-forms.checkbox-list name="role[]" id="role" :items="$roles" :selected="$dataRoles" />                    
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">User Status</label>
                                <select value="{{$user->status}}" name="status" id="status" >
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