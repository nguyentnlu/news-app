<x-app-layout>
    @if(Gate::check('can_do', ['create role']))
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
                        <form action="{{ route('role.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <x-forms.input label="Role" name="name" id="name" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Permissions</label><br>
                                <x-forms.checkbox-list name="permission[]" id="permission" :items="$permissions"/>                    
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Role Status</label>
                                <select id="status" name="status" >
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