<x-app-layout>
    @if(Gate::check('can_do', ['read article']))
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
                        <div class="row">
                            <div class="col-sm-6 d-flex justify-content-start">
                                @if(Gate::check('can_do', ['create article']))
                                    <a href="{{ route('article.create')}}" class="btn btn-primary col-2">
                                        Create
                                    </a>
                                @endif
                            </div>
                            <x-forms.search value="{{ $search ?? '' }}" />

                        </div>
                        <br/>
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table id="table" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Author</th>
                                        @if(Gate::check('can_do', ['enable article']))
                                        <th scope="col">Status</th>
                                        @endif
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($articles as $article)
                                    <tr>
                                        <td>{{ $loop->index }}</td>
                                        <td>{{ $article->title }}</td>
                                        <td>
                                            <img width="180px" src="{{ asset('storage/'.$article->url) }}" />
                                        </td>
                                        <td>{{ $article->category_name }}</td>
                                        <td>{{ $article->author_name }}</td>
                                        @if(Gate::check('can_do', ['enable article']))
                                        <td>
                                            @if ($article->status)
                                                <a class="btn btn-link"
                                                    href="{{ route('article.status', $article->id) }}"
                                                    >
                                                    <i class="fa fa-toggle-on fa-lg" aria-hidden="true"></i>
                                                </a>
                                            @else
                                                <a class="btn btn-light"
                                                    href="{{ route('article.status', $article->id) }}"
                                                    >
                                                    <i class="fa fa-toggle-off fa-lg" aria-hidden="true"></i>
                                                </a>
                                            @endif
                                        </td>
                                        @endif
                                        <td>
                                            <form class="d-flex justify-content-end"
                                                action="{{ route('article.destroy', $article->id) }}" 
                                                method="POST"
                                                >
                                                @method('DELETE')
                                                @csrf
                                                <a class="btn btn-info" style="display:inline"
                                                    href="{{ route('article.show', $article->id)}}"
                                                    >
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>|
                                                <a class="btn btn-warning" 
                                                    style="display:inline" 
                                                    href="{{ route('article.edit', $article->id)}}"
                                                    >
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>|
                                                @if(Gate::check('can_do', ['delete article']))
                                                    <button style="display:inline"
                                                        onclick="return confirm('Are you sure you want to delete this article?')"
                                                        class="btn btn-danger delete"
                                                        >
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </button>
                                                @endif
                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="py-8">
                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <x-slot name="scripts">
        <script>
            $(document).ready(function () {
                $('#table').DataTable({
                    "pagingType": "input",
                    paging: false,
                    info: false,
                    "searching": false
                });
            });
        </script>
    </x-slot>
</x-app-layout>