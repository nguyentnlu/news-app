<x-app-layout>
    @if(Gate::check('can_do', ['create category']))
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="bg-light rounded h-100 p-4">
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <x-forms.input label="Category name" name="name" id="name" />
                            </div>
                            <div class="mb-3">
                                <x-forms.input label="Category slug" name="slug" id="slug" />
                            </div>
                            <div class="mb-3">
                                <label for="tag" class="form-label">Tags</label><br>
                                <x-forms.checkbox-list name="tag[]" id="tag" :items="$tags"/>                    
                                <a href="{{ route('tag.create')}}">+ Add tag</a>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Category Status</label>
                                <select name="status" id="status">
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
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