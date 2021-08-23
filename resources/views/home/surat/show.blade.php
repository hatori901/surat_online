@extends('layouts.app')
@section('title')
    Surat Milik {{ $surat->user->name }}
@endsection
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
                <a href="{{ route('surats') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Daftar Surat</a>
              </div>
            </li>
            <li>
                <div class="flex items-center">
                  <svg class="flex-shrink-0 h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                  </svg>
                  <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Surat {{ $surat->user->name }}</a>
                </div>
              </li>
          </ol>
        </div>
      </nav>
    </div>
  </div>
@endsection
@section('content')
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
      <div class="flex items-center justify-between">
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Surat {{ $surat->kategori }}
              </h3>
              <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Milik {{ $surat->user->name }}
              </p>
        </div>
        <div>
            <form id="form_status">
                @csrf
                <select name="status" id="status" class="{{ $surat->status == 'Pending' ? 'bg-yellow-100 text-yellow-800' : ($surat->status == 'Diterima' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }} block text-md font-medium rounded-md">
                    <option value="Pending" {{ $surat->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Diterima" {{ $surat->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="Ditolak" {{ $surat->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </form>
        </div>
      </div>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
      <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">
            Full name
          </dt>
          <dd class="mt-1 text-sm text-gray-900">
            {{ $surat->user->name }}
          </dd>
        </div>
        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">
            Email
          </dt>
          <dd class="mt-1 text-sm text-gray-900">
            {{ $surat->user->email }}
          </dd>
        </div>
        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">
            Orang Tua /  Wali
          </dt>
          <dd class="mt-1 text-sm text-gray-900">
            {{ $surat->wali_murid }}
          </dd>
        </div>
        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">
            Tanggal
          </dt>
          <dd class="mt-1 text-sm text-gray-900">
            {{ $surat->tanggal }}
          </dd>
        </div>
        <div class="sm:col-span-2">
          <dt class="text-sm font-medium text-gray-500">
            Alasan
          </dt>
          <dd class="mt-1 text-sm text-gray-900">
            {{ $surat->alasan }}
          </dd>
        </div>
        <div class="sm:col-span-2">
          <dt class="text-sm font-medium text-gray-500">
            Tanda Tangan
          </dt>
          <dd class="mt-1 text-sm text-gray-900">
              <input type="hidden" id="json_sig" value="{{ $surat->ttd }}">
              <div id="signature" class="w-full md:w-1/2 h-48"></div>
          </dd>
        </div>
      </dl>
    </div>
  </div>
  @section('script')
    <script>
        $('#signature').signature().signature('draw',$('#json_sig').val()).signature('disable');
        $('#status').change(function(){
            var _token = $("input[name=_token]").val();
            var status = $("#status option:selected").val();
            $.ajax({
                url : "{{ route('surats.update',$surat->id) }}",
                type : "POST",
                data : {
                    _token : _token,
                    status : status
                },
                success: function(data){
                    location.reload();
                }
            });
        })
    </script>
  @endsection
@endsection
