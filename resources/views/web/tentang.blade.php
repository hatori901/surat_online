@extends('layouts.web')
@section('title','Tentang')
@section('content')
<div class="relative bg-white py-16 sm:py-24">
    <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-24 lg:items-start">
      <div class="relative sm:py-16 lg:py-0">
        <div aria-hidden="true" class="hidden sm:block lg:absolute lg:inset-y-0 lg:right-0 lg:w-screen">
          <div class="absolute inset-y-0 right-1/2 w-full bg-gray-50 rounded-r-3xl lg:right-72"></div>
          <svg class="absolute top-8 left-1/2 -ml-3 lg:-right-8 lg:left-auto lg:top-12" width="404" height="392" fill="none" viewBox="0 0 404 392">
            <defs>
              <pattern id="02f20b47-fd69-4224-a62a-4c9de5c763f7" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
              </pattern>
            </defs>
            <rect width="404" height="392" fill="url(#02f20b47-fd69-4224-a62a-4c9de5c763f7)" />
          </svg>
        </div>
        <div class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0 lg:max-w-none lg:py-20">
          <div class="relative pt-64 pb-10 rounded-2xl shadow-xl overflow-hidden">
            <img class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1570610183363-c7531f3eaa68?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=753&q=80" alt="">
            <div class="absolute inset-0 bg-blue-500 mix-blend-multiply"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-blue-600 via-blue-600 opacity-90"></div>
            <div class="relative px-8">
              <div>
                <h2 class="text-3xl text-white font-extrabold">Surat Online</h2>
              </div>
              <blockquote class="mt-8">
                <div class="relative text-lg font-medium text-white md:flex-grow">
                  <svg class="absolute top-0 left-0 transform -translate-x-3 -translate-y-2 h-8 w-8 text-blue-400" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                    <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                  </svg>
                  <p class="relative">
                    Sebuah aplikasi berbasis web yang berguna untuk memudahkan siswa siswi mengirim surat izin tanpa keluar rumah.
                  </p>
                </div>
              </blockquote>
            </div>
          </div>
        </div>
      </div>

      <div class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0">
        <div class="pt-12 sm:pt-16 lg:pt-20">
          <h2 class="text-3xl text-gray-900 font-extrabold tracking-tight sm:text-4xl">
            Tentang Surat Online
          </h2>
          <div class="mt-6 text-gray-500 space-y-6">
            <p class="text-lg">
                Surat Izin Online adalah aplikasi berbasis web surat izin secara online yang tujukan kepada siswa siswi sekolah dalam masa pandemi.
            </p>
            <p>Tanpa Aplikasi Surat Online siswa seringkali tidak memberikan surat izin ke sekolah dengan berbagai alasan<br>Contohnya sebagai berikut.</p>
            <ol class="list-decimal ml-5">
                <li>Rumah jauh dari sekolah</li>
                <li>Tidak ada yang mengantarkan surat</li>
                <li>Tidak bisa membuat surat</li>
            </ol>
            <p>Dengan dibuatnya aplikasi surat online,<br>Diharapkan :</p>
            <ul class="list-disc ml-5">
                <li>Membantu siswa dalam mengirim surat jika terkendala transportasi</li>
                <li>Membantu siswa yang tidak sempat membuat surat</li>
                <li>Menghemat biaya</li>
                <li>Efisien dalam pengiriman surat</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
