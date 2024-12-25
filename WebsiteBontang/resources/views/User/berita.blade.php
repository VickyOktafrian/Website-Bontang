<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <nav aria-label="breadcrumb" class="w-full">
    <ol class="breadcrumb flex items-center">
      <li class="breadcrumb-item">
        <a href="{{ route('beranda') }}">Beranda</a>
      </li>
      <li class="breadcrumb-item text-gray-600 mx-2">/</li>
      <li class="breadcrumb-item active text-bold text-gray-800"><a href="{{ route('laman-berita') }}">Laman Berita</a></li>
      <li class="breadcrumb-item text-gray-600 mx-2">/</li>
      <li class="breadcrumb-item active text-bold text-gray-800" aria-current="page">{{ $berita->judul }}</li>
    </ol>
  </nav>

  <!-- =========={ MAIN }==========  -->
  <main id="content">

    <div class="bg-gray-50 py-6">
      <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
        <div class="flex flex-row flex-wrap">
          <!-- full -->
          <div class="flex-shrink max-w-full w-full overflow-hidden">
            <div class="w-full py-3 mb-3">
              <h2 class="text-gray-800 text-3xl font-bold">
                <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span> {{ $berita->judul }}
              </h2>
            </div>
            <div class="flex flex-row flex-wrap -mx-3">
              <div class="max-w-full w-full px-4">
                <!-- Post content -->
                <div class="leading-relaxed pb-4">
                  <figure class="text-center mb-20 justify-center items-center">
                    <img class="max-w-full h-[500px] w-auto" src="{{ asset('storage/' . $berita->thumbnail) }}" alt="{{ $berita->judul_gambar }}">
                    <figcaption class="float-left font-xs">Gambar {{ $berita->judul_gambar }}.</figcaption>
                  </figure>

                  <div class="text-justify pr-20 md:pr-56">
                    {!! $berita->isi !!}
                  </div >
                  <strong class="float-left mt-20">Dibuat oleh: <span>{{ $berita->author }}</span></strong>
                  <p class="float-right mt-20">{{ \Carbon\Carbon::parse($berita->created_at)->diffForHumans() }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>
</x-layout>
