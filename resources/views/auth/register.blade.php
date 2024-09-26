@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-center text-2xl font-bold text-gray-700">{{ __('Register') }}</h2>

        <form method="POST" action="{{ route('register') }}" class="mt-6">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">{{ __('Name') }}</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="w-full px-4 py-2 mt-2 border rounded-lg text-gray-700 bg-gray-50 focus:outline-none focus:border-indigo-500 @error('name') border-red-500 @enderror">
                
                @error('name')
                    <span class="text-sm text-red-500 mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">{{ __('Email Address') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 mt-2 border rounded-lg text-gray-700 bg-gray-50 focus:outline-none focus:border-indigo-500 @error('email') border-red-500 @enderror">
                
                @error('email')
                    <span class="text-sm text-red-500 mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-2 mt-2 border rounded-lg text-gray-700 bg-gray-50 focus:outline-none focus:border-indigo-500 @error('password') border-red-500 @enderror">

                @error('password')
                    <span class="text-sm text-red-500 mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password-confirm" class="block text-sm font-medium text-gray-600">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" name="password_confirmation" required
                    class="w-full px-4 py-2 mt-2 border rounded-lg text-gray-700 bg-gray-50 focus:outline-none focus:border-indigo-500">
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700">
                    {{ __('Register') }}
                </button>
            </div>
        </form>

        <!-- Login Link -->
        @if (Route::has('login'))
            <p class="mt-4 text-sm text-gray-600 text-center">
                {{ __("Already have an account?") }}
                <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">
                    {{ __('Login') }}
                </a>
            </p>
        @endif
    </div>
</div>
@endsection
