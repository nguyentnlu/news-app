<x-app-layout>
    @if(Gate::check('can_do', ['enable article']) || Gate::check('article_owner', $article))
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Article') }}
            </h2>
        </x-slot>
        <div class="container-fulid pt-4 px-4" style='font-family: "Heebo",sans-serif;'>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="bg-light rounded h-100 p-4">
                                <div class="bg-light rounded h-100 p-4">
                                    @if(Gate::check('article_owner', $article))
                                        <div class="d-flex justify-content-end">
                                            <a class="btn btn-warning" 
                                                style="display:inline" 
                                                href="{{ route('article.edit', $article->id) }}"
                                                >
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    @endif
                                    <dl class="row mb-0">
                                        <dt class="col-sm-3 p-3 text-right">Title:</dt>
                                        <dd class="col-sm-9 p-3">{{ $article->title }}</dd>

                                        <dt class="col-sm-3 p-3 text-right">Image:</dt>
                                        <dd class="col-sm-9 p-3">
                                            <img src="{{ Storage::disk('s3')->url($article->url) }}" width="400px"/>
                                        </dd>

                                        <dt class="col-sm-3 text-truncate p-3 text-right">Category:</dt>
                                        <dd class="col-sm-9 p-3">{{ $article->category->name }}</dd>

                                        <dt class="col-sm-3 p-3 text-right">Tags:</dt>
                                        <dd class="col-sm-9 p-3">
                                            @foreach($dataTags as $tag)
                                                <p>
                                                    <i class="fa fa-tags" aria-hidden="true"></i> 
                                                    {{ $tag->name }}
                                                </p>
                                            @endforeach
                                        </dd>

                                        <dt class="col-sm-3 text-truncate p-3 text-right">Status:</dt>
                                        <dd class="col-sm-9 p-3">
                                            @if ($article['status'] == 0)
                                                Disable
                                            @else
                                                Enable
                                            @endif
                                        </dd>

                                        <dt class="col-sm-3 text-truncate p-3 text-right">Created by:</dt>
                                        <dd class="col-sm-9 p-3">{{ $article->author->name }}</dd>

                                        <dt class="col-sm-3 text-truncate p-3 text-right">Created at:</dt>
                                        <dd class="col-sm-9 p-3">{{ $article->created_at }}</dd>

                                        <dt class="col-sm-3 p-3 text-right">Updated at:</dt>
                                        <dd class="col-sm-9 p-3">{{ $article->updated_at }}</dd>

                                        <dt class="col-sm-3 p-3 text-right">Content:</dt>
                                        <dd class="col-sm-9 p-3" id='textareaContent'>
                                            {!!  $article->content  !!}
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>