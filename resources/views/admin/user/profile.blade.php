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
                    <br />
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                    @endif
                    <div class="bg-light rounded h-100 p-4">
                        <form id="profile-save" action="{{ route('profile-save') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <x-forms.input readonly label="Email" name="email" id="email" value="{{ $user->email }}"/>
                            </div>
                            <div class="mb-3">
                                <x-forms.input label="Name" name="name" id="name" value="{{ $user->name }}"/>
                            </div>
                            <div class="mb-3">
                                <x-forms.input label="Birthday" name="birthday" id="birthday" value="{{ $user->birthday }}" type="date"/>
                            </div>
                            <div class="mb-3">
                                <x-forms.input label="Phone" name="phone" id="phone" value="{{ $user->phone }}"/>
                            </div>
                            <div class="mb-3">
                                <x-forms.input label="Address" name="address" id="address" value="{{ $user->address }}"/>
                            </div>
                            <div class="mb-3">
                                <x-forms.input label="Current password" name="password" id="password" type="password"/>
                            </div>
                            <button id="save-profile" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <br />
                    @if (session()->has('message_pass'))
                    <div class="alert alert-success">
                        {{ session()->get('message_pass') }}
                    </div>
                    @endif
                    @if (session()->has('error_pass'))
                    <div class="alert alert-danger">
                        {{ session()->get('error_pass') }}
                    </div>
                    @endif
                    <div class="bg-light rounded h-100 p-4">
                        <form id="password-change" action="{{ route('password-change') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <x-forms.input label="Current password" name="current_password" id="current_password" type="password"/>
                            </div>
                            <div class="mb-3">
                                <x-forms.input label="New password" name="new_password" id="new_password" type="password"/>
                            </div>
                            <div class="mb-3">
                                <x-forms.input label="New password confirmation" name="new_password_confirmation" id="new_password_confirmation" type="password"/>
                            </div>
                            <button id="change-password" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="scripts">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $('#change-password').on('click', function() {
                $('#profile-save').on('submit', function(event) {
                    event.preventDefault();
                })
            })

            $('#save-profile').on('click', function() {
                $('#password-change').on('submit', function(event) {
                    event.preventDefault();
                })
            })
        </script>
    </x-slot>
</x-app-layout>