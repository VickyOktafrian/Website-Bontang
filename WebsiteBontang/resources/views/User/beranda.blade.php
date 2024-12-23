<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
    <div class="flex flex-col md:flex-row">
      <!-- Carousel Section -->
      <div id="indicators-carousel" class="relative w-full md:w-2/3" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative h-[400px] md:h-[400px] overflow-hidden rounded-xl">
          <!-- Item 1 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
            <img src="https://cdn.antaranews.com/cache/1200x800/2014/03/20140314Jokowi-Capres-001xb-cp-xx.jpg" class="absolute block w-[900px] h-[400px] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
          </div>
          <!-- Item 2 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://cdn.antaranews.com/cache/1200x800/2014/03/20140314Jokowi-Capres-001xb-cp-xx.jpg" class="absolute block w-[900px] h-[400px] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
          </div>
          <!-- Item 3 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://cdn.antaranews.com/cache/1200x800/2014/03/20140314Jokowi-Capres-001xb-cp-xx.jpg" class="absolute block w-[900px] h-[400px] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
          </div>
          <!-- Item 4 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://cdn.antaranews.com/cache/1200x800/2014/03/20140314Jokowi-Capres-001xb-cp-xx.jpg" class="absolute block w-[900px] h-[400px] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
          </div>
          <!-- Item 5 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://cdn.antaranews.com/cache/1200x800/2014/03/20140314Jokowi-Capres-001xb-cp-xx.jpg" class="absolute block w-[900px] h-[400px] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
          </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
          <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
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
  
      <!-- Card Section -->
      <div class="card bg-base-100 h-[400px] md:h-[400px] shadow-xl rounded-xl ml-10 md:ml-10 mt-5 md:mt-0 relative overflow-hidden ">
        <a href="{{ '/prakiraan-cuaca' }}">
          <figure class="px-10 pt-10">
            <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
              alt="Prakiraan Cuaca" class="rounded-xl h-[250px] w-[300px]" />
          </figure>
        </a>
        <div class="card-body items-center text-center mt-5 px-10">
          <p>Bontang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
      </div>
      </div>
    </div>



    <p class="mt-20">Bontang Terkini</p>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5 justify-between">
        <article class="overflow-hidden rounded-xl shadow transition hover:shadow-lg m-5">
            <img alt="" src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" class="h-56 w-full object-cover" />
            <div class="bg-white p-4 sm:p-6">
                <time datetime="2022-10-10" class="block text-xs text-gray-500"> 10th Oct 2022 </time>
                <a href="#">
                    <h3 class="mt-0.5 text-lg text-gray-900">How to position your furniture for positivity</h3>
                </a>
                <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae dolores, possimus
                    pariatur animi temporibus nesciunt praesentium dolore sed nulla ipsum eveniet corporis quidem,
                    mollitia itaque minus soluta, voluptates neque explicabo tempora nisi culpa eius atque
                    dignissimos. Molestias explicabo corporis voluptatem?
                </p>
                <a href="#" class="text-blue-500 text-sm mt-3 inline-block">Baca Selengkapnya</a>
            </div>
        </article>
        <article class="overflow-hidden rounded-xl shadow transition hover:shadow-lg m-5">
            <img alt="" src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" class="h-56 w-full object-cover" />
            <div class="bg-white p-4 sm:p-6">
                <time datetime="2022-10-10" class="block text-xs text-gray-500"> 10th Oct 2022 </time>
                <a href="#">
                    <h3 class="mt-0.5 text-lg text-gray-900">How to position your furniture for positivity</h3>
                </a>
                <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae dolores, possimus
                    pariatur animi temporibus nesciunt praesentium dolore sed nulla ipsum eveniet corporis quidem,
                    mollitia itaque minus soluta, voluptates neque explicabo tempora nisi culpa eius atque
                    dignissimos. Molestias explicabo corporis voluptatem?
                </p>
                <a href="#" class="text-blue-500 text-sm mt-3 inline-block">Baca Selengkapnya</a>
            </div>
        </article>
        <article class="overflow-hidden rounded-xl shadow transition hover:shadow-lg m-5">
            <img alt="" src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" class="h-56 w-full object-cover" />
            <div class="bg-white p-4 sm:p-6">
                <time datetime="2022-10-10" class="block text-xs text-gray-500"> 10th Oct 2022 </time>
                <a href="#">
                    <h3 class="mt-0.5 text-lg text-gray-900">How to position your furniture for positivity</h3>
                </a>
                <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae dolores, possimus
                    pariatur animi temporibus nesciunt praesentium dolore sed nulla ipsum eveniet corporis quidem,
                    mollitia itaque minus soluta, voluptates neque explicabo tempora nisi culpa eius atque
                    dignissimos. Molestias explicabo corporis voluptatem?
                </p>
                <a href="#" class="text-blue-500 text-sm mt-3 inline-block">Baca Selengkapnya</a>
            </div>
        </article>
        <article class="overflow-hidden rounded-xl shadow transition hover:shadow-lg m-5">
            <img alt="" src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" class="h-56 w-full object-cover" />
            <div class="bg-white p-4 sm:p-6">
                <time datetime="2022-10-10" class="block text-xs text-gray-500"> 10th Oct 2022 </time>
                <a href="#">
                    <h3 class="mt-0.5 text-lg text-gray-900">How to position your furniture for positivity</h3>
                </a>
                <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae dolores, possimus
                    pariatur animi temporibus nesciunt praesentium dolore sed nulla ipsum eveniet corporis quidem,
                    mollitia itaque minus soluta, voluptates neque explicabo tempora nisi culpa eius atque
                    dignissimos. Molestias explicabo corporis voluptatem?
                </p>
                <a href="#" class="text-blue-500 text-sm mt-3 inline-block">Baca Selengkapnya</a>
            </div>
        </article>
        <article class="overflow-hidden rounded-xl shadow transition hover:shadow-lg m-5">
            <img alt="" src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" class="h-56 w-full object-cover" />
            <div class="bg-white p-4 sm:p-6">
                <time datetime="2022-10-10" class="block text-xs text-gray-500"> 10th Oct 2022 </time>
                <a href="#">
                    <h3 class="mt-0.5 text-lg text-gray-900">How to position your furniture for positivity</h3>
                </a>
                <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae dolores, possimus
                    pariatur animi temporibus nesciunt praesentium dolore sed nulla ipsum eveniet corporis quidem,
                    mollitia itaque minus soluta, voluptates neque explicabo tempora nisi culpa eius atque
                    dignissimos. Molestias explicabo corporis voluptatem?
                </p>
                <a href="#" class="text-blue-500 text-sm mt-3 inline-block">Baca Selengkapnya</a>
            </div>
        </article>
        <article class="overflow-hidden rounded-xl shadow transition hover:shadow-lg m-5">
            <img alt="" src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" class="h-56 w-full object-cover" />
            <div class="bg-white p-4 sm:p-6">
                <time datetime="2022-10-10" class="block text-xs text-gray-500"> 10th Oct 2022 </time>
                <a href="#">
                    <h3 class="mt-0.5 text-lg text-gray-900">How to position your furniture for positivity</h3>
                </a>
                <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae dolores, possimus
                    pariatur animi temporibus nesciunt praesentium dolore sed nulla ipsum eveniet corporis quidem,
                    mollitia itaque minus soluta, voluptates neque explicabo tempora nisi culpa eius atque
                    dignissimos. Molestias explicabo corporis voluptatem?
                </p>
                <a href="#" class="text-blue-500 text-sm mt-3 inline-block">Baca Selengkapnya</a>
            </div>
            
        </article>
        <div class="col-span-full flex justify-center">
            <a
                class="inline-block rounded-xl border border-sky-400 px-12 py-3 text-sm font-medium text-sky-400 hover:bg-sky-400 hover:text-white focus:outline-none focus:ring active:bg-sky-300"
                href="{{ '/laman-berita' }}"
            >
                Info Lainnya
            </a>
        </div>
    </div>
    
    <div class="flex items-center justify-between">
        <h1 class="text-6xl font-bold">Kuy, Liburan di Bontang!</h1>
       
        <x-pariwisata></x-pariwisata>
    </div>
    <div class="grid items-center justify-center mt-36 pb-20 bg-sky-200 w-full rounded-xl">
        <img class="mid" src="{{ asset('images/belanja.png') }}" alt="Belanja" />
        <x-produk></x-produk>
        <div class="col-span-full flex justify-center mt-8">
            <a
                class="inline-block rounded-xl border border-sky-600 px-12 py-3 text-sm font-medium text-sky-600 hover:bg-sky-600 hover:text-white focus:outline-none focus:ring active:bg-sky-400"
                href="{{ '/portal-belanja' }}"
            >
                Jelajahi Lainnya
            </a>
        </div>
    </div>

    <div class="grid items-center justify-center mt-20 p-5 bg-sky-400 w-full rounded-xl">
        <h1 class="text-white text-center text-xl font-bold mb-8">Pelayanan Kota Bontang</h1>
        <div class="grid grid-cols-4 gap-8">
          <!-- Left Section -->
          <div class="col-span-3">
            <div class="bg-white rounded-full flex justify-between items-center p-4 mb-4 shadow-md">
              <span class="text-sky-800 ">1. Administrasi Kependudukan</span>
              <a href="https://disdukcapil.bontangkota.go.id/index.php/layanan-online" target="blank"><button class="bg-yellow-400 text-white rounded-full px-6 py-2">Kunjungi Laman</button></a>
            </div>
            <div class="bg-white rounded-full flex justify-between items-center p-4 mb-4 shadow-md">
              <span class="text-sky-800">2. Polres Bontang</span>
              <a href="https://polresbontang.com/" target="blank"><button class="bg-yellow-400 text-white rounded-full px-6 py-2">Kunjungi Laman</button></a>
            </div>
            <div class="bg-white rounded-full flex justify-between items-center p-4 mb-4 shadow-md">
              <span class="text-sky-800">3. Pemadam Kebakaran</span>
              <a href="https://sippn.menpan.go.id/instansi/178429/pemerintah-kota-bontang/dinas-pemadam-kebakaran-dan-penyelamatan" target="blank"><button class="bg-yellow-400 text-white rounded-full px-6 py-2">Kunjungi Laman</button></a>
            </div>
            <div class="bg-white rounded-full flex justify-between items-center p-4 mb-4 shadow-md">
              <span class="text-sky-800">4. PDAM</span>
              <a href="https://www.perumdatirtataman.com/"><button class="bg-yellow-400 text-white rounded-full px-6 py-2" target="blank">Kunjungi Laman</button></a>
            </div>
            <div class="bg-white rounded-full flex justify-between items-center p-4 mb-4 shadow-md">
              <span class="text-sky-800">5. PLN</span>
              <a href="https://www.plnipservices.co.id/our-portofolio/suplai-energi-ptmg-tarakan-kalimantan-timur" target="blank"><button class="bg-yellow-400 text-white rounded-full px-6 py-2">Kunjungi Laman</button></a>
            </div>
          </div>
          <!-- Right Section -->
          <div class="col-span-1 flex justify-center align-center items-start">
            <a href="{{ '/pengaduan' }}"><div class="bg-white rounded-xl p-6 shadow-md w-full text-center">
              <span class="text-black font-bold">PENGADUAN</span>
            </div></a>
          </div>
        </div>
      </div>
      
        
  </x-layout>
  