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
                        <div class="container-fluid pt-4 px-4">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-6 d-flex justify-content-start">
                                            @if(Gate::check('can_do', ['create category']))
                                                <a href="{{ route('category.create') }}"
                                                    class="btn btn-primary col-2">Create</a>
                                            @endif
                                        </div>
                                        <x-forms.search value="{{ $search ?? '' }}" />
                                    </div>
                                    <br />
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
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Slug</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Created at</th>
                                                    <th scope="col">Updated at</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($categories as $category)
                                                <tr>
                                                    <td>{{ $category->id }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->slug }}</td>
                                                    <td>
                                                        @if ($category->status == 0)
                                                            Disable
                                                        @else
                                                            Enable
                                                        @endif
                                                    </td>
                                                    <td>{{ $category->created_at }}</td>
                                                    <td>{{ $category->updated_at }}</td>
                                                    <td>
                                                        <form class="d-flex justify-content-end"
                                                            action="{{ route('category.destroy', $category->id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            @if(Gate::check('can_do', ['edit category']))
                                                                <a class="btn btn-warning" 
                                                                    style="display:inline"
                                                                    href="{{ route('category.edit', $category->id)}}"
                                                                    >
                                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                </a>|
                                                            @endif
                                                            @if(Gate::check('can_do', ['delete category']))
                                                                <button 
                                                                    id="delete" 
                                                                    style="display:inline"
                                                                    onclick="return confirm('Are you sure you want to delete this category?')"
                                                                    class="btn btn-danger"
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
                                        {{ $categories->appends(request()->query())->links() }}
                                    </div>
                                </div>
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