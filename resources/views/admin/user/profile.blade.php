<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
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
                        <form action="{{ route('profile-save') }}" method="POST">
                            @method('PUT')
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="email" class="form-label">User email</label>
                                <input id="email" readonly value="{{ $user->email}}" name="email" type="text" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">User name</label>
                                <input id="name" value="{{ $user->name}}" name="name" type="text" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="birthday" class="form-label">User birthday</label>
                                <input id="birthday" value="{{ $user->birthday}}" name="birthday" type="date" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">User phone</label>
                                <input id="phone" value="{{ $user->phone}}" name="phone" type="text" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">User address</label>
                                <input id="address" value="{{ $user->address}}" name="address" type="text" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" name="password" type="password" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Password confirm</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <button class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>