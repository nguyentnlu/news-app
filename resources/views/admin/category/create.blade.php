<x-app-layout>
    @if(Gate::check('can_do', ['read category']))
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
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('category.store') }}" method="POST">
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Category name</label>
                                <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Category slug</label>
                                <input name="slug" type="text" class="form-control" id="slug" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="tag" class="form-label">Tags</label><br>
                                @foreach($tags as $tag)
                                <input type="checkbox" id="{{$tag->id}}" name="tag[]" value="{{$tag->id}}">
                                <label for="{{$tag->id}}">{{$tag->name}}</label><br>
                                @endforeach
                                <a href="{{ route('tag.create')}}">+ Add tag</a>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Category Status</label>
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