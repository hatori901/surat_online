@extends('layouts.app')
@section('title','Buat Artikel')
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
                <a href="{{ route('blogs') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Blog</a>
              </div>
            </li>
            <li>
                <div class="flex items-center">
                  <svg class="flex-shrink-0 h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                  </svg>
                  <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Buat Artikel</a>
                </div>
              </li>
          </ol>
        </div>
      </nav>
    </div>
  </div>
@endsection
@section('content')
<section class="py-12 max-w-md mx-auto relative z-10 px-4 sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
    <div class="bg-gray-200 shadow-md rounded-md">
        <h2 class="text-2xl font-bold mx-5 py-5">Edit Artikel</h2>
        <form method="POST" action="{{ route('blogs.update',$blog->id) }}" class="py-5 px-4">
            @csrf
            @method('POST')
            <div>
                <label for="title" class="block text-lg px-3 font-medium text-gray-700">Judul Artikel</label>
                <div class="mt-1">
                    <input type="text" name="title" id="title" value="{{ $blog->title }}" class="shadow-sm text-md py-3 px-4 focus:ring-indigo-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Judul Artikel">
                </div>
            </div>
            <div class="my-5">
                <label for="title" class="block text-lg px-3 font-medium text-gray-700">Artikel</label>
                <textarea name="article" id="artikel" cols="50" rows="50">{{ $blog->artikel }}</textarea>
            </div>
            <div>
                <label for="title" class="block text-lg my-3 px-3 font-medium text-gray-700">Status</label>
                <div class="mt-1">
                    <select name="is_publish" id="is_publish" class="shadow-sm text-md py-3 px-4 focus:ring-indigo-500 focus:border-blue-500 block w-1/4 sm:text-sm border-gray-300 rounded-md">
                        <option value="0" {{ $blog->is_publish == 0 ? 'selected' : '' }}>Draft</option>
                        <option value="1" {{ $blog->is_publish == 1 ? 'selected' : '' }}>Publish</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="inline-flex items-center my-4 px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Buat Artikel
            </button>
        </form>
    </div>
</section>
<script>
    class MyUploadAdapter {
       constructor(loader) {
          this.loader = loader;
          this.url = '{{ route('blogs.upload') }}';
       }
       upload() {
          return this.loader.file.then(
             (file) =>
                new Promise((resolve, reject) => {
                   this._initRequest();
                   this._initListeners(resolve, reject, file);
                   this._sendRequest(file);
                })
          );
       }
       abort() {
          if (this.xhr) {
             this.xhr.abort();
          }
       }
       _initRequest() {
          const xhr = (this.xhr = new XMLHttpRequest());
          xhr.open("POST", this.url, true);
          xhr.setRequestHeader("x-csrf-token", "{{ csrf_token() }}");
          xhr.responseType = "json";
       }
       _initListeners(resolve, reject, file) {
          const xhr = this.xhr;
          const loader = this.loader;
          const genericErrorText = `Couldn't upload file: ${file.name}.`;
          xhr.addEventListener("error", () => reject(genericErrorText));
          xhr.addEventListener("abort", () => reject());
          xhr.addEventListener("load", () => {
             const response = xhr.response;
             if (!response || response.error) {
                return reject(response && response.error ? response.error.message : genericErrorText);
             }
             resolve({
                default: response.url,
             });
          });
          if (xhr.upload) {
             xhr.upload.addEventListener("progress", (evt) => {
                if (evt.lengthComputable) {
                   loader.uploadTotal = evt.total;
                   loader.uploaded = evt.loaded;
                }
             });
          }
       }
       _sendRequest(file) {
          const data = new FormData();
          data.append("upload", file);
          this.xhr.send(data);
       }
    }

    function SimpleUploadAdapterPlugin(editor) {
       editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {
          return new MyUploadAdapter(loader);
       };
    }
    ClassicEditor.create(document.querySelector("#artikel"), {
       extraPlugins: [SimpleUploadAdapterPlugin],
    }).catch((error) => {
       console.error(error);
    });

</script>
@endsection
