@extends('layouts.web')
@section('title')
    {{ $blog->title }}
@endsection
@section('content')
<div class="relative px-4 sm:px-6 lg:px-">
    <div class="text-lg max-w-prose mx-auto text-center">
        <h1>
            <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{ $blog->title }}</span>
        </h1>
        <span class="text-xs text-center">{{ $blog->created_at }}7</span>
    </div>
    <div class="mt-6 prose prose-indigo prose-lg text-gray-500 mx-auto">
        <?= html_entity_decode($blog->artikel) ?>
    </div>
</div>
@endsection
