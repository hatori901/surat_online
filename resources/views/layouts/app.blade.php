<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Surat Online Web Application</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.1/dist/alpine.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
    @yield('source')
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div>
        <nav x-data="{ open: false }" class="bg-blue-700">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
              <div class="flex items-center">
                <div class="flex-shrink-0">
                    <h1 class="text-center text-4xl font-extrabold text-white">Surat Online</h1>
                </div>
                <div class="hidden md:block">
                  <div class="ml-10 flex items-baseline space-x-4">
                         <a href="{{ route('home') }}" class="{{ Request::is('home') ? 'bg-blue-900 text-white' : 'text-white hover:bg-blue-800 hover:text-white' }} px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>

                         @if (Auth::user()->role == 'User')
                        <a href="{{ route('surat') }}" class="{{ Request::is('home/surat') ? 'bg-blue-900 text-white' : 'text-white hover:bg-blue-800 hover:text-white' }} px-3 py-2 rounded-md text-sm font-medium">Suratku</a>
                        @endif
                        @if (Auth::user()->role == 'Admin')
                        <a href="{{ route('surats') }}" class="{{ Request::is('home/surats') ? 'bg-blue-900 text-white' : 'text-white hover:bg-blue-800 hover:text-white' }} px-3 py-2 rounded-md text-sm font-medium">Daftar Surat</a>
                        <a href="{{ route('users') }}" class="{{ Request::is('home/users') ? 'bg-blue-900 text-white' : 'text-white hover:bg-blue-800 hover:text-white' }} px-3 py-2 rounded-md text-sm font-medium">Daftar Users</a>
                        <a href="{{ route('blogs') }}" class="{{ Request::is('home/blogs') ? 'bg-blue-900 text-white' : 'text-white hover:bg-blue-800 hover:text-white' }} px-3 py-2 rounded-md text-sm font-medium">Blogs</a>
                        @endif
                        <a href="{{ route('settings') }}" class="{{ Request::is('home/settings') ? 'bg-blue-900 text-white' : 'text-white hover:bg-blue-800 hover:text-white' }} px-3 py-2 rounded-md text-sm font-medium">Settings</a>
                  </div>
                </div>
              </div>
              <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                  <!-- Profile dropdown -->
                  <div x-data="{ open: false }" @keydown.escape.stop="open = false; focusButton()" class="ml-3 relative">
                    <div>
                      <button type="button" @click="open = !open" class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" x-ref="button" >
                        <span class="sr-only">Open user menu</span>
                        @if (Auth::user()->profile == NULL)
                            <span class="inline-block h-8 w-8 rounded-full overflow-hidden bg-gray-400">
                                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </span>
                        @else
                            <img class="h-8 w-8 rounded-full" src="{{ asset(Auth::user()->profile) }}" alt="">
                        @endif
                      </button>
                    </div>

                      <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" x-ref="menu-items" x-description="Dropdown menu, show/hide based on menu state." role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false" @keydown.enter.prevent="open = false; focusButton()" @keyup.space.prevent="open = false; focusButton()" style="display: none;">
                          <a href="{{ route('logout') }}"
                            class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1" @click="open = false;"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>

                      </div>

                  </div>
                </div>
              </div>
              <div class="-mr-2 flex md:hidden">
                <button type="button" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()">
                  <span class="sr-only">Open main menu</span>
                  <svg x-state:on="Menu open" x-state:off="Menu closed" class="h-6 w-6 block" :class="{ 'hidden': open, 'block': !(open) }" x-description="Heroicon name: outline/menu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>
                  <svg x-state:on="Menu open" x-state:off="Menu closed" class="h-6 w-6 hidden" :class="{ 'block': open, 'hidden': !(open) }" x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
    </svg>
                </button>
              </div>
            </div>
          </div>

          <div x-description="Mobile menu, show/hide based on menu state." class="md:hidden" id="mobile-menu" x-show="open" style="display: none;">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">

                   <a href="{{ route('home') }}" class="{{ Request::is('home') ? 'bg-blue-900 text-white' : 'text-gray-300 hover:bg-blue-800 hover:text-white' }} block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>


                   @if (Auth::user()->role == 'User')
                   <a href="{{ route('surat') }}" class="{{ Request::is('home/surat') ? 'bg-blue-900 text-white' : 'text-white hover:bg-blue-800 hover:text-white' }} px-3 py-2 rounded-md text-sm font-medium">Suratku</a>
                   @endif
                  @if (Auth::user()->role == 'Admin')
                        <a href="{{ route('surats') }}" class="{{ Request::is('home/surats') ? 'bg-blue-900 text-white' : 'text-white hover:bg-blue-800 hover:text-white' }} px-3 py-2 rounded-md text-sm font-medium">Daftar Surat</a>
                        <a href="{{ route('users') }}" class="{{ Request::is('home/users') ? 'bg-blue-900 text-white' : 'text-white hover:bg-blue-800 hover:text-white' }} px-3 py-2 rounded-md text-sm font-medium">Daftar Users</a>
                        <a href="{{ route('blogs') }}" class="{{ Request::is('home/blogs') ? 'bg-blue-900 text-white' : 'text-white hover:bg-blue-800 hover:text-white' }} px-3 py-2 rounded-md text-sm font-medium">Blogs</a>
                    @endif

                  <a href="{{ route('settings') }}" class="{{ Request::is('home/settings') ? 'bg-blue-900 text-white' : 'text-gray-300 hover:bg-blue-800 hover:text-white' }} block px-3 py-2 rounded-md text-base font-medium">Settings</a>

            </div>
            <div class="pt-4 pb-3 border-t border-gray-700">
              <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                @if (Auth::user()->profile == NULL)
                <span class="inline-block h-10 w-10 rounded-full overflow-hidden bg-gray-400">
                    <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </span>
                @else
                <img class="h-10 w-10 rounded-full" src="{{ asset(Auth::user()->profile) }}" alt="">
                @endif

                </div>
                <div class="ml-3">
                  <div class="text-base font-medium leading-none text-white">{{ Auth::user()->name }}</div>
                  <div class="text-sm font-medium leading-none text-gray-400">{{ Auth::user()->email }}</div>
                </div>
              </div>
              <div class="mt-3 px-2 space-y-1">
                  <a href="{{ route('logout') }}"
                  class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700"
                  onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form>
              </div>
            </div>
          </div>
        </nav>

        <header class="bg-white shadow">
          <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
              @yield('header')
            </h1>
          </div>
        </header>
        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
      </div>
      @yield('script')
</body>
</html>
