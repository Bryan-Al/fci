@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-center text-2xl font-bold text-gray-700">{{ __('Login') }}</h2>

        <form method="POST" action="{{ route('login') }}" class="mt-6">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">{{ __('Email Address') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
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

            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}
                        class="text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700">
                    {{ __('Login') }}
                </button>
            </div>
        </form>

        <!-- Register Link -->
        @if (Route::has('register'))
            <p class="mt-4 text-sm text-gray-600 text-center">
                {{ __("Don't have an account?") }}
                <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">
                    {{ __('Register') }}
                </a>
            </p>
        @endif
    </div>
</div>
@endsection

