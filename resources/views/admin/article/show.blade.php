<x-app-layout>
    @if(Gate::check('can_do', ['read article']))
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article') }}
        </h2>
    </x-slot>
    <div class="container-fulid d-flex justify-content-center pt-4 px-4" style='font-family: "Heebo",sans-serif;'>

        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">

                <dl class="row mb-0">
                    <dt class="col-sm-4 p-2">Title</dt>
                    <dd class="col-sm-8 p-2">{{$article->title}}</dd><br />

                    <dt class="col-sm-4 p-2">Image</dt>
                    <dd class="col-sm-8 p-2"><img src="{{ asset('storage/'.$article->url) }}" /></dd>

                    <dt class="col-sm-4 text-truncate p-2">Category</dt>
                    <dd class="col-sm-8 p-2">{{$article -> category -> name}}</dd>

                    <dt class="col-sm-4 p-2">Tags</dt>
                    <dd class="col-sm-8 p-2">
                        @foreach($dataTags as $tag)
                        <p><i class="bi bi-tags-fill"></i> {{$tag->name}}</p>
                        @endforeach
                    </dd>

                    <dt class="col-sm-4 text-truncate p-2">Status</dt>
                    <dd class="col-sm-8 p-2"><?php
                                                if ($article['status'] == 0)
                                                    echo "Disable";
                                                else
                                                    echo "Enable";
                                                ?></dd>

                    <dt class="col-sm-4 text-truncate p-2">Created by</dt>
                    <dd class="col-sm-8 p-2">{{$article -> author -> name}}</dd>

                    <dt class="col-sm-4 text-truncate p-2">Created at</dt>
                    <dd class="col-sm-8 p-2">{{$article -> created_at}}</dd>

                    <dt class="col-sm-4 p-2">Updated at</dt>
                    <dd class="col-sm-8 p-2">{{$article -> updated_at}}</dd>

                    <dt class="col-sm-4 p-2">Content</dt>
                    <dd class="col-sm-8 p-2" id='textareaContent'>
                        <?php echo $article->content ?>
                    </dd>
                    @if(Gate::check('article_owner', $article))
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-success" style="display:inline" href="{{ route('article.edit', $article->id)}}">Edit article</a>
                    </div>
                    @endif
                </dl>
            </div>

        </div>
    </div>
    @endif
</x-app-layout>