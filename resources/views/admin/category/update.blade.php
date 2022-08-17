<x-app-layout>
    @can('edit category')
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
                        <form action="{{ route('category.update', $category->id) }}" method="POST">
                            @method('PUT')
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label sty for="category" class="form-label">Category name</label>
                                <input id="category" value="{{ $category->name}}" name="name" type="text" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Category slug</label>
                                <input id="slug" value="{{ $category->slug}}" name="slug" type="text" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="tag" class="form-label">Tags</label><br>
                                @foreach($tags as $tag)
                                <input <?php
                                        foreach ($dataTags as $dataTag) {
                                            if ($tag->id == $dataTag->id)
                                                echo "checked";
                                        }
                                        ?> type="checkbox" id="{{$tag->id}}" name="tag[]" value="{{$tag->id}}">
                                <label for="{{$tag->id}}">{{$tag->name}}</label><br>
                                @endforeach
                                <a href="{{ route('tag.create')}}">+ Add tag</a>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Category Status</label>
                                <select value="{{$category->status}}" name="status" id="status" style="height: 35px">
                                    <option <?php if ($category->status == 1) {
                                                echo ("selected");
                                            } ?> value="1">enable</option>
                                    <option <?php if ($category->status == 0) {
                                                echo ("selected");
                                            } ?> value="0">disable</option>
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