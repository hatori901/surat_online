<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Surat Online Web Application</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/@tailwindcss/typography@0.4.x/dist/typography.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/all.css') }}">
    <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/fonts/fontawesome/js/all.js') }}"></script>
    <script src="{{ asset('assets/lottie/lottie-player.js') }}"></script>
</head>
<body>
    <header class="bg-transparent">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" aria-label="Top">
          <div class="w-full py-6 flex items-center justify-between border-b border-indigo-500 lg:border-none">
            <div class="flex items-center">
              <a href="#">
                <span class="sr-only">Surat Online</span>
                <h1 class="text-gray-900 text-3xl font-extrabold">Surat Online</h1>
              </a>
              <div class="hidden ml-10 space-x-8 lg:block">
                <a href="{{ route('landing') }}" class="text-base font-medium text-gray-900 hover:text-gray-500" key="Solutions">
                  Home
                </a>
                <a href="{{ route('blog') }}" class="text-base font-medium text-gray-900 hover:text-gray-500" key="Docs">
                    Blog
                </a>
                <a href="{{ route('tentang') }}" class="text-base font-medium text-gray-900 hover:text-gray-500" key="Tentang">
                    Tentang
                </a>
              </div>
            </div>
            <div class="ml-10 space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="inline-block bg-blue-500 py-2 px-4 border border-transparent rounded-md text-base font-medium text-white hover:bg-opacity-75">Sign in</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-block bg-blue-700 py-2 px-4 border border-transparent rounded-md text-base font-medium text-white hover:bg-blue-500">Register</a>
                    @endif
                @else
                <a href="{{ route('home') }}" class="inline-block bg-blue-700 py-2 px-4 border border-transparent rounded-md text-base font-medium text-white hover:bg-blue-500">Dashboard</a>
                @endguest


            </div>
          </div>
          <div class="py-4 flex flex-wrap justify-center space-x-6 lg:hidden">
            <a href="{{ route('landing') }}" class="text-base font-medium text-gray-900 hover:text-gray-500" key="Solutions">
              Home
            </a>
            <a href="{{ route('blog') }}" class="text-base font-medium text-gray-900 hover:text-gray-500" key="Docs">
                Blog
            </a>
            <a href="{{ route('tentang') }}" class="text-base font-medium text-gray-900 hover:text-gray-500" key="Pricing">
              Tentang
            </a>
          </div>
        </nav>
      </header>
    @yield('content')
    <footer class="bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
          <nav class="-mx-5 -my-2 flex flex-wrap justify-center" aria-label="Footer">
            <div class="px-5 py-2">
                <a href="{{ route('blog') }}" class="text-base text-gray-900 hover:text-gray-500">
                  Blog
                </a>
            </div>

            <div class="px-5 py-2">
              <a href="{{ route('tentang') }}" class="text-base text-gray-900 hover:text-gray-500">
                Tentang
              </a>
            </div>
            <div class="px-5 py-2">
              <a href="{{ route('login') }}" class="text-base text-gray-900 hover:text-gray-500">
                Login
              </a>
            </div>
            <div class="px-5 py-2">
                <a href="{{ route('register') }}" class="text-base text-gray-900 hover:text-gray-500">
                  Register
                </a>
            </div>
          </nav>
          <p class="mt-8 text-center text-base text-gray-400">
            &copy; Erwin Alam Syah Putra. All rights reserved.
          </p>
        </div>
      </footer>
</body>
</html>
