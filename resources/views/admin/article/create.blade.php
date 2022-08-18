<x-app-layout>
    @if(Gate::check('can_do', ['create article']))
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article') }}
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
                        <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input name="title" type="text" class="form-control" id="title" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input name="slug" type="text" class="form-control" id="slug" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="img-preview" class="form-label">Image</label>
                                <img id="img-preview" width="300px"/>
                            </div>
                            <div class="mb-3">
                                <label for="url" class="form-label">Change image</label>
                                <input accept="image/*" name="url" type="file" class="form-control" id="url" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select name="category_id" id="category_id" style="height: 35px">
                                    @foreach ($category as $cate)
                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tags</label><br>
                                @foreach($tags as $tag)
                                <input type="checkbox" id="tag" name="tag[]" value="{{$tag->id}}">
                                <label for="tag">{{$tag->name}}</label><br>
                                @endforeach
                                <a href="{{ route('tag.create')}}">+ Add tag</a>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea name="content" id="content"></textarea>
                            </div>
                            <button class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="scripts">
        <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#content'), {})
                .catch(error => {
                    console.error(error);
                });


            $('input[name="url"]').on('change', function() {
                $('#img-preview').attr('src', '');
                const file = this.files[0];
                const reader = new FileReader();
                reader.onloadend = function() {
                    $('#img-preview').attr('src', reader.result);
                };
                if (file) {
                    reader.readAsDataURL(file);
                }
            })

            // function changeImage() {
            //     var x = document.getElementById("url").files[0].name;
            //     document.getElementById("image").src = "http://localhost/images/" + x;
            // }
        </script>
    </x-slot>
    @endif
</x-app-layout>