@extends('layouts.web')
@section('title','Blog')
@section('content')
<div class="relative bg-gray-50 pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
    <div class="absolute inset-0">
      <div class="bg-white h-1/3 sm:h-2/3"></div>
    </div>
    <div class="relative max-w-7xl mx-auto">
      <div class="text-center">
        <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
          Blog
        </h2>
        <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
          Artikel Mengenai Surat dan Berita
        </p>
      </div>
      <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
        @foreach ($blogs as $blog)
        <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
            <div class="flex-1 bg-white p-6 flex flex-col justify-between">
              <div class="flex-1">
                <p class="text-sm font-medium text-indigo-600">
                  <a href="#" class="hover:underline">
                    Article
                  </a>
                </p>
                <a href="#" class="block mt-2">
                  <p class="text-xl font-semibold text-gray-900">
                    {{ $blog->title}}
                  </p>
                  <p class="mt-3 text-base text-gray-500">
                    <?= Str::words(html_entity_decode($blog->artikel),20) ?>
                  </p>
                </a>
              </div>
              <div class="mt-6 flex items-center justify-between">
                <div class="ml-3">
                  <div class="flex space-x-1 text-sm text-gray-500">
                    <time datetime="2020-03-16">
                      {{ $blog->created_at }}
                    </time>
                  </div>
                </div>
                <a href="{{ route('blogs.show',$blog->slug)}}">Lihat Selengkapnya</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection