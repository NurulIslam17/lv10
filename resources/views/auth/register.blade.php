{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('auth-master')
@section('main')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card overflow-hidden">
                <div class="bg-soft-primary">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-4">
                                <h5 class="text-primary">Free Register</h5>
                                <p>Get your free Skote account now.</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div>
                        <a href="index.html">
                            <div class="avatar-md profile-user-wid mb-4">
                                <span class="avatar-title rounded-circle bg-light">
                                    <img src="{{ asset('dash_board') }}/assets/images/logo.svg" alt=""
                                        class="rounded-circle" height="34">
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="p-2">
                        <form class="form-horizontal" action="{{ route('register') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="useremail">Name</label>
                                <input type="text" name="name" class="form-control" id="useremail"
                                    placeholder="Enter Name">
                            </div>

                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="email" name="email" class="form-control" id="username"
                                    placeholder="Enter Email">
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" name="password" class="form-control" id="userpassword"
                                    placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <label for="userpassword">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="userpassword"
                                    placeholder="Confirm password">
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-primary btn-block waves-effect waves-light"
                                    type="submit">Register</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="mt-5 text-center">

                <div>
                    <p>Already have an account ? <a href="{{ route('home') }}" class="font-weight-medium text-primary">
                            Login</a> </p>
                    <p>© 2023 By<i class="mdi mdi-heart text-danger"></i>Nurul</p>
                </div>
            </div>

        </div>
    </div>
@endsection
