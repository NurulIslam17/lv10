{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
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
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p>Sign in to continue to Skote.</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="{{ asset('dash_board') }}/assets/images/profile-img.png" alt=""
                                class="img-fluid">
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
                        <form class="form-horizontal" method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="text" name="email" class="form-control" id="username"
                                    placeholder="Enter Email">
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" name="password" class="form-control" id="userpassword"
                                    placeholder="Enter password">
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log
                                    In</button>
                            </div>

                            <div class="mt-4 text-center">
                                <a href="#" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot
                                    your password?</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="mt-5 text-center">

                <div>
                    <p>Don't have an account ? <a href="{{ route('register.account') }}"
                            class="font-weight-medium text-primary">
                            Signup
                            now </a> </p>
                    <p>© 2023 with <i class="mdi mdi-heart text-danger"></i> by Nurul</p>
                </div>
            </div>

        </div>
    </div>
@endsection
