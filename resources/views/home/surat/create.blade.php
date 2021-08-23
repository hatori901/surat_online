@extends('layouts.app')
@section('title','Buat Surat')
@section('source')
<link type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
@endsection
@section('header')
<div class="max-w-7xl mx-auto px-4 sm:px-6">
    <div class="py-3">
      <nav class="flex" aria-label="Breadcrumb">
        <div class="flex sm:hidden">
          <a href="{{ route('home') }}" class="group inline-flex space-x-3 text-sm font-medium text-gray-500 hover:text-gray-700">
            <!-- Heroicon name: solid/arrow-narrow-left -->
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
                <a href="{{ route('surat') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Surat</a>
              </div>
            </li>
            <li>
                <div class="flex items-center">
                  <svg class="flex-shrink-0 h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                  </svg>
                  <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Buat Surat</a>
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
        <div class="bg-white shadow-md-rounded-md">
            <section aria-labelledby="applicant-information-title">
                <div class="bg-white shadow sm:rounded-lg">
                  <div class="px-4 py-5 sm:px-6">
                    <h2 id="applicant-information-title" class="text-lg leading-6 font-medium text-gray-900">
                      Buat Surat
                    </h2>
                  </div>
                  <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                    <form method="POST" action="{{ route('surat.store') }}" class="space-y-8 divide-y divide-gray-200">
                        @csrf
                        <div class="space-y-8 divide-y divide-gray-200">
                          <div class="pt-8">
                            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                              <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                  Nama Lengkap
                                </label>
                                <div class="mt-1">
                                  <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" readonly class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                              </div>

                              <div class="sm:col-span-3">
                                <label for="wali_murid" class="block text-sm font-medium text-gray-700">
                                  Orang Tua / Wali
                                </label>
                                <div class="mt-1">
                                  <input type="text" name="wali_murid" id="wali_murid" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                              </div>
                              <div class="sm:col-span-6">
                                <label for="alasan" class="block text-sm font-medium text-gray-700">
                                  Alasan
                                </label>
                                <div class="mt-1">
                                  <textarea name="alasan" id="alasan" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                                </div>
                              </div>
                              <div class="sm:col-span-2">
                                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                                <select id="kategori" required name="kategori" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                  <option value="">Pilih...</option>
                                  <option value="Izin">Izin</option>
                                  <option value="Sakit">Sakit</option>
                                </select>
                              </div>
                              <div class="sm:col-span-2">
                                <label for="tanggal" class="block text-sm font-medium text-gray-700">
                                  Tanggal
                                </label>
                                <div class="mt-1">
                                  <input type="date" name="tanggal" id="tanggal" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                              </div>
                              <div class="sm:col-span-6">
                                <label for="ttd" class="block text-sm font-medium text-gray-700">
                                  Tanda Tangan Orang Tua / Wali
                                </label>
                                <div class="mt-1">
                                    <div id="signaturePad" class="w-full md:w-1/2 h-48"></div>
                                </div>
                                <button id="clear" class="py-2 px-3 rounded-md text-white bg-red-500">Reset</button>
                                <input type="hidden" id="signature64" name="ttd" required>
                              </div>
                            </div>
                          </div>
                        <div class="pt-5">
                          <div class="flex justify-end">
                            <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                              Cancel
                            </button>
                            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                              Buat
                            </button>
                          </div>
                        </div>
                      </form>
                  </div>
                </div>
              </section>
        </div>
    </div>
</main>
@section('script')
<script>
    var signaturePad = $('#signaturePad').signature({syncField: '#signature64', syncFormat: 'JSON'});
    $('#clear').click(function(e) {
    e.preventDefault();
    signaturePad.signature('clear');
    $("#signature64").val('');
    });
</script>
@endsection
@endsection
