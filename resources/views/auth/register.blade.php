@extends('layouts.web')
@section('title','Regtsiter')
@section('content')
<div class="bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h1 class="text-center text-my-5 text-4xl font-extrabold text-gray-900">Surat Online</h1>
        <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
          Register
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
        <form class="space-y-6" action="{{ route('register') }}" method="POST">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">
            Full Name
            </label>
            <div class="mt-1">
                <input id="name" name="name" type="text" value="{{ old('name') }}"  autocomplete="name" required class="@error('name') border-red-500 @enderror appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('name')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">
                Email address
                </label>
                <div class="mt-1">
                    <input id="email" name="email" type="email" value="{{ old('email') }}"  autocomplete="email" required class="@error('email') border-red-500 @enderror appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">
                Password
                </label>
                <div class="mt-1">
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="@error('password') border-red-500 @enderror appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap">
                <label for="password-confirm" class="block text-sm font-medium text-gray-700">
                    {{ __('Confirm Password') }}:
                </label>

                <input id="password-confirm" type="password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="text-sm">
                <span class="font-medium text-gray-600 hover:text-gray-500">Sudah Punya Akun? <a href="{{ route('login') }}" class="text-blue-500">Masuk</a></span>
            </div>
            <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Register
                </button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
