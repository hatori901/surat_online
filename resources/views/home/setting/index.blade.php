@extends('layouts.app')
@section('title','Settings')
@section('header')
<div class="max-w-7xl mx-auto px-4 sm:px-6">
    <div class="py-3">
      <nav class="flex" aria-label="Breadcrumb">
        <div class="flex sm:hidden">
          <a href="{{ route('home') }}" class="group inline-flex space-x-3 text-sm font-medium text-gray-500 hover:text-gray-700">
            <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            <span>Back to Dashboard</span>
          </a>
        </div>
        <div class="hidden sm:block">
          <ol class="flex items-center space-x-4">
            <li>
              <div>
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-gray-500">
                  <!-- Heroicon name: solid/home -->
                  <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                  </svg>
                  <span class="sr-only">Home</span>
                </a>
              </div>
            </li>

            <li>
              <div class="flex items-center">
                <svg class="flex-shrink-0 h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                  <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                </svg>
                <a href="{{ route('settings') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Settings</a>
              </div>
            </li>
          </ol>
        </div>
      </nav>
    </div>
  </div>
@endsection
@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">
                    @if ($message = Session::get('error'))
                        <div class="rounded-md bg-red-50 p-4 my-5">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                      </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-green-800">
                                        {{ $message }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="rounded-md bg-green-50 p-4 my-5">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-green-800">
                                        {{ $message }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endif
        <div class="bg-white shadow-md-rounded-md">
            <form class="divide-y divide-gray-200 lg:col-span-9" action="{{ route('settings.update',Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="py-6 px-4 sm:p-6 lg:pb-8">
                  <div>
                    <h2 class="text-lg leading-6 font-medium text-gray-900">Profile</h2>
                  </div>

                  <div class="mt-6 flex flex-col lg:flex-row">
                    <div class="flex-grow space-y-6">
                      <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">
                          Nama Lengkap
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                          <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" readonly class="focus:ring-blue-500 focus:border-blue-500 flex-grow block w-full min-w-0 rounded-md sm:text-sm border-gray-300" value="deblewis">
                        </div>
                      </div>
                      <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                          Email
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                          <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" readonly class="focus:ring-blue-500 focus:border-blue-500 flex-grow block w-full min-w-0 rounded-md sm:text-sm border-gray-300" value="deblewis">
                        </div>
                      </div>

                      <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700">
                          Alamat Rumah
                        </label>
                        <div class="mt-1">
                          <textarea id="alamat" name="alamat" rows="3" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">{{ Auth::user()->alamat == NULL ? '' : Auth::user()->alamat }}</textarea>
                        </div>
                      </div>
                    </div>

                    <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
                      <p class="text-sm font-medium text-gray-700" aria-hidden="true">
                        Foto Profile
                      </p>
                      <div class="mt-1 lg:hidden">
                        <div class="flex items-center">
                          <div class="flex-shrink-0 inline-block rounded-full overflow-hidden h-12 w-12" aria-hidden="true">
                            @if (Auth::user()->profile == NULL)
                            <span class="inline-block h-full w-full rounded-full overflow-hidden bg-gray-400">
                                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </span>
                            @else
                            <img class="rounded-full h-full w-full" src="{{ asset(Auth::user()->profile) }}" alt="">
                            @endif

                          </div>
                          <div class="ml-5 rounded-md shadow-sm">
                            <div class="group relative border border-gray-300 rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                              <label for="profile" class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
                                <span>Ubah</span>
                                <span class="sr-only"> user photo</span>
                              </label>
                              <input id="profile" name="profile" type="file" class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="hidden relative rounded-full overflow-hidden lg:block">
                        @if (Auth::user()->profile == NULL)
                            <span class="inline-block h-40 w-40 rounded-full overflow-hidden bg-gray-400">
                                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </span>
                            @else
                            <img class="rounded-full h-40 w-40" src="{{ asset(Auth::user()->profile) }}" alt="">
                            @endif
                        <label for="profile" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                          <span>Ubah</span>
                          <span class="sr-only"> user photo</span>
                          <input type="file" id="profile" name="profile" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="mt-6 grid grid-cols-12 gap-6">
                    <div class="col-span-12 sm:col-span-6 mt-6">
                        <label for="sekolah" class="block text-sm font-medium text-gray-700">
                          Sekolah
                        </label>
                        <div class="mt-1">
                          <input type="text" name="sekolah" id="sekolah" value="{{ Auth::user()->sekolah }}" readonly class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                      </div>

                      <div class="col-span-12 sm:col-span-6 mt-6">
                        <label for="kelas" class="block text-sm font-medium text-gray-700">
                          Kelas
                        </label>
                        <div class="mt-1">
                            @if (Auth::user()->kelas_id == NULL)
                                <select type="text" name="kelas" id="kelas" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    <option value="">Pilih ...</option>
                                    @foreach ($kelas as $k)
                                        <option value="{{ $k->id }}">{{$k->nama}}</option>
                                    @endforeach
                                </select>
                            @else
                            <input type="text"  value="{{ $kelas }}" readonly class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            <input type="hidden" name="kelas" value="{{ Auth::user()->kelas_id }}">
                            @endif

                        </div>
                      </div>
                    <div class="col-span-12 sm:col-span-6 mt-6">
                      <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                      <input type="number" name="phone_number" id="phone_number" value="{{ Auth::user()->phone_number == NULL ? '' : Auth::user()->phone_number }}" class="appearance-none mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                  </div>
                  <div class="mt-4 py-4 px-4 flex justify-end sm:px-6">
                    <button type="submit" class="ml-5 bg-blue-700 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                      Save
                    </button>
                  </div>
                </div>
              </form>
        </div>
        <div class="space-y-6 mt-6">
            <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                @if ($message = Session::get('success-pw'))
                        <div class="rounded-md bg-green-50 p-4 my-5">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <!-- Heroicon name: solid/check-circle -->
                                    <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-green-800">
                                        {{ $message }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endif
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Security Information</h3>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('settings.pass',Auth::user()->id) }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-4 sm:col-span-4 lg:col-span-6">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="password" name="password" id="password" class="max-w-lg appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-s">
                                @error('password')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="col-span-4 sm:col-span-4 lg:col-span-4">
                                <label for="password-confirm" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password-confirm" class="max-w-lg appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-s">
                            </div>
                            </div>
                            <div class="flex justify-end mt-10">
                                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection
