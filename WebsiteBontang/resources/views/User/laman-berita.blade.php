<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 relative">
        <div class="grid grid-cols-1 sm:grid-cols-12 gap-5">

            {{-- Berita Utama --}}
            @if ($berita->first())
                <div class="sm:col-span-5 justify-center items-center">
                    <a href="{{ route('berita', $berita->first()->slug) }}">
                        <div class="bg-cover text-center overflow-hidden"
                            style="min-height: 300px; background-image: url('{{ $berita->first()->thumbnail }}')"
                            title="{{ $berita->first()->judul }}">
                        </div>
                    </a>
                </div>
            @endif

            {{-- Berita Lainnya --}}
            <div class="sm:col-span-7 grid grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($berita->skip(1)->take(6) as $item) {{-- skip(1)->take(6) is fine here for the next 6 items --}}
                    <div class="">
                        <a href="{{ route('berita', $item->slug) }}">
                            <div class="h-40 bg-cover text-center overflow-hidden"
                                style="background-image: url('{{ $item->thumbnail }}')"
                                title="{{ $item->judul }}">
                            </div>
                        </a>
                        <a href="{{ route('berita', $item->slug) }}"
                            class="text-gray-900 inline-block font-semibold text-md my-2 hover:text-indigo-600 transition duration-500 ease-in-out">
                            {{ $item->judul }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Berita Tambahan --}}
    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 relative">
        <div class="grid grid-cols-1 sm:grid-cols-12 gap-10">

            {{-- Berita Sidebar Kiri --}}
            @if ($berita->skip(7)->first()) {{-- Skip first 7 items --}}
                <div class="sm:col-span-6 lg:col-span-5">
                    <a href="{{ route('berita', $berita->skip(7)->first()->slug) }}">
                        <div class="h-56 bg-cover text-center overflow-hidden"
                            style="background-image: url('{{ $berita->skip(7)->first()->thumbnail }}')"
                            title="{{ $berita->skip(7)->first()->judul }}">
                        </div>
                    </a>
                    <div class="mt-3 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
                        <div class="lg:pl-16">
                            <a href="{{ route('berita', $berita->skip(7)->first()->slug) }}"
                                class="text-gray-900 font-bold text-lg mb-2 hover:text-indigo-600 transition duration-500 ease-in-out">
                                {{ $berita->skip(7)->first()->judul }}
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Berita Sidebar Tengah --}}
            <div class="sm:col-span-6 lg:col-span-4">
                @foreach ($berita->skip(8)->take(4) as $item) {{-- Skip 8 and take next 4 items --}}
                    <div class="flex items-start mb-3 pb-3">
                        <a href="{{ route('berita', $item->slug) }}" class="inline-block mr-3">
                            <div class="w-20 h-20 bg-cover bg-center"
                                style="background-image:url('{{ $item->thumbnail }}');">
                            </div>
                        </a>
                        <div class="text-sm">
                            <p class="text-gray-600 text-xs">{{ $item->created_at->format('M d') }}</p>
                            <a href="{{ route('berita', $item->slug) }}"
                                class="text-gray-900 font-medium hover:text-indigo-600 leading-none">
                                {{ $item->judul }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Berita Sidebar Kanan --}}
            @if ($berita->skip(12)->first()) {{-- Skip first 12 items --}}
                <div class="sm:col-span-12 lg:col-span-3">
                    <a href="{{ route('berita', $berita->skip(12)->first()->slug) }}">
                        <div class="h-56 bg-cover text-center overflow-hidden"
                            style="background-image: url('{{ $berita->skip(12)->first()->thumbnail }}')"
                            title="{{ $berita->skip(12)->first()->judul }}">
                        </div>
                    </a>
                    <div class="mt-3 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
                        <div class="">
                            <a href="{{ route('berita', $berita->skip(12)->first()->slug) }}"
                                class="text-gray-900 font-bold text-lg mb-2 hover:text-indigo-600 transition duration-500 ease-in-out">
                                {{ $berita->skip(12)->first()->judul }}
                            </a>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>

    {{-- Pagination --}}
    <nav class="mb-4 flex justify-center space-x-4" aria-label="Pagination">

        {{-- Previous Button --}}
        @if ($berita->onFirstPage())
            <span class="rounded-lg border border-sky-600 px-2 py-2 text-gray-700 cursor-not-allowed">
                <span class="sr-only">Previous</span>
                <svg class="mt-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </span>
        @else
            <a href="{{ $berita->previousPageUrl() }}" class="rounded-lg border border-sky-600 px-2 py-2 text-gray-700">
                <span class="sr-only">Previous</span>
                <svg class="mt-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </a>
        @endif
    
        {{-- Page Number Links --}}
        @foreach ($berita->getUrlRange(1, $berita->lastPage()) as $page => $url)
            @if ($page == $berita->currentPage())
                <span class="rounded-lg border border-sky-600 bg-sky-400 px-4 py-2 text-white">{{ $page }}</span>
            @else
                <a href="{{ $url }}" class="rounded-lg border border-sky-600 px-4 py-2 text-gray-700 hover:text-white hover:bg-sky-400 transition duration-200">
                    {{ $page }}
                </a>
            @endif
        @endforeach
    
        {{-- Next Button --}}
        @if ($berita->hasMorePages())
            <a href="{{ $berita->nextPageUrl() }}" class="rounded-lg border border-sky-600 px-2 py-2 text-gray-700">
                <span class="sr-only">Next</span>
                <svg class="mt-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </a>
        @else
            <span class="rounded-lg border border-sky-600 px-2 py-2 text-gray-700 cursor-not-allowed">
                <span class="sr-only">Next</span>
                <svg class="mt-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </span>
        @endif
    
    </nav>
    

</x-layout>
