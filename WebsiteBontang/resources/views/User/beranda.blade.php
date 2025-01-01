<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  
    <div class="flex flex-col md:flex-row">
      <!-- Carousel Section -->
      <div id="indicators-carousel" class="relative w-full md:w-2/3 bg-base-100 shadow-xl " data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative h-[400px] md:h-[400px] overflow-hidden rounded-xl">
            <!-- Item -->
            @foreach($carousel as $index => $item)
                <div class="duration-700 ease-in-out rounded-xl {{ $index == 0 ? 'block' : 'hidden' }}" data-carousel-item>
                    <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                </div>
            @endforeach
        </div>
    
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
            @foreach($carousel as $index => $item)
                <button type="button" class="w-3 h-3 rounded-full {{ $index == 0 ? 'bg-blue-600' : 'bg-white' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
            @endforeach
        </div>
    
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <img src="https://cdn-icons-png.flaticon.com/128/17050/17050534.png" alt="Previous">
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <img src="https://cdn-icons-png.flaticon.com/128/1549/1549454.png" alt="Next">
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
    
  {{-- Cuaca  --}}
  <div class="card bg-base-100 h-[400px] md:h-[400px] shadow-xl rounded-xl ml-10 md:ml-10 mt-5 md:mt-0 relative overflow-hidden ">
    <a href="{{ '/prakiraan-cuaca' }}">
      <figure class="px-10 pt-10">
        <img src="https://www.nabire.net/wp-content/uploads/2014/10/cuaca1.jpg"
          alt="Prakiraan Cuaca" class="rounded-xl h-[250px] w-[300px]" />
      </figure>
    </a>
    <div class="card-body items-center text-center mt-5 px-10">
      <p>Bontang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
  </div>
  </div>
</div>
  



    <!-- News Section -->
    <p class="text-2xl font-bold mt-10 mb-5">Bontang Terkini</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
      @foreach ($berita as $item)
        <article class="bg-white rounded-xl shadow-lg overflow-hidden">
          <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="" class="h-48 w-full object-cover">
          <div class="p-4">
            <time datetime="{{ $item->created_at->toDateString() }}" class="text-xs text-gray-500">
              {{ $item->created_at->diffForHumans() }}
            </time>
            <h3 class="mt-2 text-lg text-gray-900">{{ $item->judul }}</h3>
            <a href="{{ route('berita', $item->slug) }}" class="text-blue-500 text-sm mt-2 inline-block">Baca Selengkapnya</a>
          </div>
        </article>
      @endforeach
    </div>

    <div class="flex justify-center mt-8">
      <a href="{{ '/laman-berita' }}" class="inline-block rounded-xl border border-sky-400 px-6 py-2 text-sm font-medium text-sky-400 hover:bg-sky-400 hover:text-white focus:outline-none focus:ring active:bg-sky-300">
        Info Lainnya
      </a>
    </div>

    <!-- Tourism Section -->
    <div class="flex flex-col lg:flex-row items-center justify-between gap-5 mt-10">
      <h1 class="text-3xl md:text-6xl font-bold">Kuy, Liburan di Bontang!</h1>
      <x-pariwisata :pariwisata="$pariwisata" />
    </div>

    <!-- Shopping Section -->
    <div class="mt-20 pb-20 bg-sky-200 rounded-xl px-4">
      <img class="mx-auto" src="{{ asset('images/belanja.png') }}" alt="Belanja">
      <x-produk :barang="$barang" />
      <div class="flex justify-center mt-8">
        <a href="{{ '/portal-belanja' }}" class="inline-block rounded-xl border border-sky-600 px-6 py-2 text-sm font-medium text-sky-600 hover:bg-sky-600 hover:text-white focus:outline-none focus:ring active:bg-sky-400">
          Jelajahi Lainnya
        </a>
      </div>
    </div>

    <div class="grid items-center justify-center mt-20 p-5 bg-sky-400 w-full rounded-xl">
      <h1 class="text-white text-center text-xl font-bold mb-8">Pelayanan Kota Bontang</h1>
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Left Section -->
        <div class="col-span-3 md:col-span-3">
          <div class="bg-white rounded-full flex flex-col md:flex-row justify-between items-center p-4 mb-4 shadow-md transition-transform transform hover:scale-105 hover:shadow-lg">
            <span class="text-sky-800  transition-colors">1. Administrasi Kependudukan</span>
            <a href="https://disdukcapil.bontangkota.go.id/index.php/layanan-online" target="blank">
              <button class="bg-yellow-400 text-white rounded-full px-6 py-2 hover:bg-yellow-500 hover:shadow-md transition-all">Kunjungi Laman</button>
            </a>
          </div>
          <div class="bg-white rounded-full flex flex-col md:flex-row justify-between items-center p-4 mb-4 shadow-md transition-transform transform hover:scale-105 hover:shadow-lg">
            <span class="text-sky-800  transition-colors">2. Polres Bontang</span>
            <a href="https://polresbontang.com/" target="blank">
              <button class="bg-yellow-400 text-white rounded-full px-6 py-2 hover:bg-yellow-500 hover:shadow-md transition-all">Kunjungi Laman</button>
            </a>
          </div>
          <div class="bg-white rounded-full flex flex-col md:flex-row justify-between items-center p-4 mb-4 shadow-md transition-transform transform hover:scale-105 hover:shadow-lg">
            <span class="text-sky-800  transition-colors">3. Pemadam Kebakaran</span>
            <a href="https://sippn.menpan.go.id/instansi/178429/pemerintah-kota-bontang/dinas-pemadam-kebakaran-dan-penyelamatan" target="blank">
              <button class="bg-yellow-400 text-white rounded-full px-6 py-2 hover:bg-yellow-500 hover:shadow-md transition-all">Kunjungi Laman</button>
            </a>
          </div>
          <div class="bg-white rounded-full flex flex-col md:flex-row justify-between items-center p-4 mb-4 shadow-md transition-transform transform hover:scale-105 hover:shadow-lg">
            <span class="text-sky-800  transition-colors">4. PDAM</span>
            <a href="https://www.perumdatirtataman.com/">
              <button class="bg-yellow-400 text-white rounded-full px-6 py-2 hover:bg-yellow-500 hover:shadow-md transition-all">Kunjungi Laman</button>
            </a>
          </div>
          <div class="bg-white rounded-full flex flex-col md:flex-row justify-between items-center p-4 mb-4 shadow-md transition-transform transform hover:scale-105 hover:shadow-lg">
            <span class="text-sky-800  transition-colors">5. PLN</span>
            <a href="https://www.plnipservices.co.id/our-portofolio/suplai-energi-ptmg-tarakan-kalimantan-timur" target="blank">
              <button class="bg-yellow-400 text-white rounded-full px-6 py-2 hover:bg-yellow-500 hover:shadow-md transition-all">Kunjungi Laman</button>
            </a>
          </div>
        </div>
        <!-- Right Section -->
        <div class="col-span-1 flex justify-center align-center items-start">
          <a href="{{ '/pengaduan' }}">
            <div class="bg-white rounded-xl p-6 shadow-md w-full text-center  hover:shadow-lg transition-all transform hover:scale-105">
              <span class="text-black font-bold  transition-colors">PENGADUAN</span>
            </div>
          </a>
        </div>
      </div>
    </div>
    
    
      
        
  </x-layout>
  