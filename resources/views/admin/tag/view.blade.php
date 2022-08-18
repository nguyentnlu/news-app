<x-app-layout>
    @if(Gate::check('can_do', ['read tag']))
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tag') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container-fluid pt-4 px-4">
                        <div class="row g-4">

                            <div class="col-12">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('tag.create')}}" class="btn btn-primary col-2">Create</a>
                                </div>
                                <br />
                                @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Tag</th>
                                                <th scope="col">SLug</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Created at</th>
                                                <th scope="col">Updated at</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tags as $tag)
                                            <tr>
                                                <td>{{$tag['id']}}</td>
                                                <td>{{$tag['name']}}</td>
                                                <td>{{$tag['slug']}}</td>
                                                <td>
                                                    <?php
                                                    if ($tag['status'] == 0)
                                                        echo "disable";
                                                    else
                                                        echo "enable";
                                                    ?>
                                                </td>
                                                <td>{{$tag['created_at']}}</td>
                                                <td>{{$tag['updated_at']}}</td>
                                                <td>
                                                    <form class="d-flex justify-content-end" action="{{ route('tag.destroy', $tag->id) }}" method="POST">
                                                        @method('DELETE')
                                                        {{csrf_field()}}
                                                        @if(Gate::check('can_do', ['edit tag']))
                                                        <a class="btn btn-success" style="display:inline" href="{{ route('tag.edit', $tag->id)}}">Edit</a>|
                                                        @endif
                                                        @if(Gate::check('can_do', ['delete tag']))
                                                        <button style="display:inline" onclick="return confirm('Are you sure you want to delete this tag?')" class="btn btn-warning">Delete</button>
                                                        @endif
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="py-8">
                                    {{ $tags->appends(request()->query())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>