@extends('layouts.web')
@section('title','Home')
@section('content')
    <div class="banner mx-auto sm:pt-10">
        <svg class="hidden lg:block absolute top-0 right-0 -mt-20 -ml-20" style="z-index: -1" width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
          <defs>
            <pattern id="de316486-4a29-4312-bdfc-fbce2132a2c1" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
              <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
            </pattern>
          </defs>
          <rect width="404" height="384" fill="url(#de316486-4a29-4312-bdfc-fbce2132a2c1)" />
        </svg>
        <div class="mx-auto max-w-7xl lg:px-8 z-20">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8">
              <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 text-center lg:px-0 lg:text-left lg:flex lg:items-center">
                <div class="lg:py-24">
                  <h1 class="mt-4 text-4xl tracking-tight font-extrabold text-white sm:mt-5 sm:text-6xl lg:mt-6 xl:text-6xl">
                    <span class="block text-gray-900">Kirim SURAT IZIN</span>
                    <span class="block text-gray-900">Tanpa Keluar Rumah</span>
                  </h1>
                  <p class="mt-3 text-base text-gray-700 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">
                    Surat Izin Web Application adalah aplikasi surat izin online yang ditujukan kepada siswa siswi sekolah.
                  </p>
                </div>
              </div>
              <div class="mt-12 -mb-16 sm:-mb-48 lg:m-0 lg:relative">
                <div class="mx-auto px-4 lg:max-w-none lg:px-0">
                  <div class="img-header mx-auto">
                    <lottie-player src="assets/images/ilustration/animate/Animation03/drawkit-grape-animation-3-LOOP.json" background="transparent"  speed="1"  style="width: 500px;" loop autoplay></lottie-player>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <section class="info">
            <div class="py-12 bg-tansparent">
                <div class="max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                  <h2 class="text-center text-gray-900 font-bold text-3xl my-10">Fitur Layanan Surat Online</h2>
                  <dl class="space-y-10 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-8">
                    <div>
                      <dt>
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                        <p class="mt-5 text-lg leading-6 font-medium text-gray-900">Buat Surat Sendiri</p>
                      </dt>
                      <dd class="mt-2 text-base text-gray-500">
                        Siswa bisa membuat surat izin sendiri melalui gadget
                      </dd>
                    </div>

                    <div>
                      <dt>
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                              </svg>
                        </div>
                        <p class="mt-5 text-lg leading-6 font-medium text-gray-900">Tanpa Perlu Datang Ke Sekolah</p>
                      </dt>
                      <dd class="mt-2 text-base text-gray-500">
                        Siswa tidak perlud datang ke sekolah
                      </dd>
                    </div>

                    <div>
                      <dt>
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                        </div>
                        <p class="mt-5 text-lg leading-6 font-medium text-gray-900">Efisien Waktu Dan Biaya</p>
                      </dt>
                      <dd class="mt-2 text-base text-gray-500">
                        Membuat surat online tanpa dikenakan biaya
                      </dd>
                    </div>
                  </dl>
                </div>
              </div>
            <div class="mx-auto max-w-7xl lg:px-8">
                <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                    <div class="mt-5 -mb-16 sm:-mb-48 lg:m-0 lg:relative">
                        <div class="mx-auto px-4 lg:max-w-none lg:px-0">
                          <div class="mx-auto py-10">
                            <lottie-player src="assets/images/ilustration/animate/Animation06/drawkit-grape-animation-6-LOOP.json" background="transparent" class="info__moc" speed="1"  style="width: 500px;" loop autoplay></lottie-player>
                          </div>
                        </div>
                    </div>
                  <div class="mx-auto max-w-md px-4 sm:py-10 sm:max-w-2xl sm:px-6 text-center lg:px-0 lg:text-left lg:flex lg:items-center">
                    <div class="lg:py-24">
                        <div class="info__content">
                            <h1 class="mt-4 text-4xl tracking-tight font-extrabold text-white sm:mt-5 sm:text-6xl lg:mt-6 xl:text-6xl">
                                <span class="block text-gray-900">Buat SURAT IZIN</span>
                                <span class="block text-gray-900">Mudah Tanpa Bikin Ribet</span>
                              </h1>
                            <div class="info__text">
                                <p>Buat Surat Izin Sekolah Tanpa Menulis. Manfaat dari aplikasi ini adalah :</p>
                            </div>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-check text-blue-500"></i> Membantu siswa mengirim surat jika terkendala transportasi</li>
                                <li><i class="fa fa-check text-blue-500"></i> Membantu siswa yang tidak sempat membuat surat</li>
                                <li><i class="fa fa-check text-blue-500"></i> Efisien dalam pengiriman surat</li>
                            </ul>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            <svg class="hidden lg:block absolute top-0 left-0 -mt-20 -ml-20" style="z-index: -1" width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                <defs>
                  <pattern id="de316486-4a29-4312-bdfc-fbce2132a2c1" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                  </pattern>
                </defs>
                <rect width="404" height="384" fill="url(#de316486-4a29-4312-bdfc-fbce2132a2c1)" />
              </svg>
        </section>

    </div>

@endsection

