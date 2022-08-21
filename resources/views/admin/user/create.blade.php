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
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <x-forms.input label="Name" name="name" id="name"/>
                            </div>
                            <div class="mb-3">
                                <x-forms.input label="Email" name="email" id="email"/>
                            </div>
                            <div class="mb-3">
                                <x-forms.input type="password" label="Password" name="password" id="password"/>
                            </div>
                            <div class="mb-3">
                                <x-forms.input type="password" label="Password confirmation" name="password_confirmation" id="password_confirmation"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Role</label><br>
                                <x-forms.checkbox-list name="role[]" id="role" :items="$roles"/>                    
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">User Status</label>
                                <select name="status" id="status" >
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