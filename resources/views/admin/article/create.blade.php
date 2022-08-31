<x-app-layout>
    @if (Gate::check('can_do', ['create article']))
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
                            <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <x-forms.input label="Title" name="title" id="title" />
                                </div>
                                <div class="mb-3">
                                    <x-forms.input label="Slug" name="slug" id="slug" />
                                </div>
                                <div class="mb-3">
                                    <label for="img-preview" class="form-label">Image</label>
                                    <img id="img-preview" width="300px" />
                                </div>
                                <div class="mb-3">
                                    <x-forms.input label="Change image" name="url" id="url" type="file"
                                        accept="image/*" />
                                </div>
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select name="category_id" id="category_id">
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tags</label><br>
                                    <x-forms.checkbox-list name="tag[]" id="tag" :items="$tags"/>
                                    <a href="{{ route('tag.create') }}">+ Add tag</a>
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
            </script>
        </x-slot>
    @endif
</x-app-layout>
