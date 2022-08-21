<x-app-layout>
    @if(Gate::check('can_do', ['edit tag']))
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tag') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="bg-light rounded h-100 p-4">
                        <form action="{{ route('tag.update', $tag->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <x-forms.input label="Tag name" name="name" id="name" value="{{ $tag->name }}" />
                            </div>
                            <div class="mb-3">
                                <x-forms.input label="Tag slug" name="slug" id="slug" value="{{ $tag->slug }}"/>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Tag Status</label>
                                <select value="{{$tag->status}}" name="status" id="status" >
                                    <option <?php if ($tag->status == 0) {
                                                echo ("selected");
                                            } ?> value="0">disable</option>
                                    <option <?php if ($tag->status == 1) {
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