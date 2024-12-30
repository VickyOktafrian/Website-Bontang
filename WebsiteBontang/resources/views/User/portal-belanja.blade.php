<x-layout-market>
  <div class="flex justify-center align-center mb-20">
      <img src="" alt="Laman Belanja" class="h-[300px] w-[1200px] border rounded-xl">
  </div>
  <div>
      <div class="font-[sans-serif] bg-white p-4 mx-auto max-w-[1400px]">      
          <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
              @foreach ($barang as $item) 
              <div class="group overflow-hidden cursor-pointer relative">
                  <a href="{{ route('belanja', $item->slug) }}">
                      <div class="bg-gray-100 aspect-[3/4] w-full overflow-hidden">
                          <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}"
                               class="h-full w-full object-cover object-top hover:scale-110 transition-all duration-700" />
                      </div>

                      <div class="p-4 relative">
                          <div class="flex flex-wrap justify-between gap-2 w-full absolute px-4 pt-3 z-10
                                      transition-all duration-500
                                      left-0 right-0
                                      group-hover:bottom-20
                                      lg:bottom-5 lg:opacity-0 lg:bg-white lg:group-hover:opacity-100
                                      max-lg:bottom-20 max-lg:py-3 max-lg:bg-white/60">

                              <button type="button" title="Add to cart" class="bg-transparent outline-none border-none">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="fill-gray-800 w-5 h-5 inline-block" viewBox="0 0 512 512">
                                      <path
                                          d="M164.96 300.004h.024c.02 0 .04-.004.059-.004H437a15.003 15.003 0 0 0 14.422-10.879l60-210a15.003 15.003 0 0 0-2.445-13.152A15.006 15.006 0 0 0 497 60H130.367l-10.722-48.254A15.003 15.003 0 0 0 105 0H15C6.715 0 0 6.715 0 15s6.715 15 15 15h77.969c1.898 8.55 51.312 230.918 54.156 243.71C131.184 280.64 120 296.536 120 315c0 24.812 20.188 45 45 45h272c8.285 0 15-6.715 15-15s-6.715-15-15-15H165c-8.27 0-15-6.73-15-15 0-8.258 6.707-14.977 14.96-14.996zM477.114 90l-51.43 180H177.032l-40-180zM150 405c0 24.813 20.188 45 45 45s45-20.188 45-45-20.188-45-45-45-45 20.188-45 45zm45-15c8.27 0 15 6.73 15 15s-6.73 15-15 15-15-6.73-15-15 6.73-15 15-15zm167 15c0 24.813 20.188 45 45 45s45-20.188 45-45-20.188-45-45-45-45 20.188-45 45zm45-15c8.27 0 15 6.73 15 15s-6.73 15-15 15-15-6.73-15-15 6.73-15 15-15zm0 0"
                                          data-original="#000000"></path>
                                  </svg>
                              </button>
                          </div>
                          <div class="z-20 relative bg-white">
                              <h6 class="text-sm font-semibold text-gray-800 truncate">{{ $item->nama }}</h6>
                              <h6 class="text-sm text-gray-600 mt-2">Rp {{ number_format($item->harga, 0, ',', '.') }}</h6>
                          </div>
                      </div>
                  </a>
              </div>
              @endforeach
          </div>
      </div>
  </div>
</x-layout-market>
