<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 relative">
        <div class="grid grid-cols-1 sm:grid-cols-12 gap-5">

            {{-- Berita Utama --}}
            @if ($berita->first())
                <div class="sm:col-span-5 justify-center items-center">
                    <a href="{{ route('berita', $berita->first()->slug) }}">
                        <div class="bg-cover text-center overflow-hidden"
                            style="min-height: 300px; background-image: url('{{ asset('storage/' . $berita->first()->thumbnail) }}')"
                            title="{{ $berita->first()->judul }}">
                        </div>
                    </a>
                </div>
            @endif

            {{-- Berita Lainnya --}}
            <div class="sm:col-span-7 grid grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($berita->skip(1)->take(6) as $item)
                    <div class="">
                        <a href="{{ route('berita', $item->slug) }}">
                            <div class="h-40 bg-cover text-center overflow-hidden"
                                style="background-image: url('{{ asset('storage/' . $item->thumbnail) }}')"
                                title="{{ $item->judul }}">
                            </div>
                        </a>
                        <a href="{{ route('berita', $item->slug) }}"
                            class="text-gray-900 inline-block font-semibold text-md my-2 hover:text-gray-500 transition duration-500 ease-in-out">
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
            @if ($berita->skip(7)->first())
                <div class="sm:col-span-6 lg:col-span-5">
                    <a href="{{ route('berita', $berita->skip(7)->first()->slug) }}">
                        <div class="h-56 bg-cover text-center overflow-hidden"
                            style="background-image: url('{{ asset('storage/' . $berita->skip(7)->first()->thumbnail) }}')"
                            title="{{ $berita->skip(7)->first()->judul }}">
                        </div>
                    </a>
                    <div class="mt-3 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
                        <div class="lg:pl-16">
                            <a href="{{ route('berita', $berita->skip(7)->first()->slug) }}"
                                class="text-gray-900 font-bold text-lg mb-2 hover:text-gray-500 transition duration-500 ease-in-out">
                                {{ $berita->skip(7)->first()->judul }}
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Berita Sidebar Tengah --}}
            <div class="sm:col-span-6 lg:col-span-4">
                @foreach ($berita->skip(8)->take(4) as $item)
                    <div class="flex items-start mb-3 pb-3">
                        <a href="{{ route('berita', $item->slug) }}" class="inline-block mr-3">
                            <div class="w-20 h-20 bg-cover bg-center"
                                style="background-image:url('{{ asset('storage/' . $item->thumbnail) }}');">
                            </div>
                        </a>
                        <div class="text-sm">
                            <p class="text-gray-600 text-xs">{{ $item->created_at->format('M d') }}</p>
                            <a href="{{ route('berita', $item->slug) }}"
                                class="text-gray-900 font-medium hover:text-gray-500 leading-none">
                                {{ $item->judul }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Berita Sidebar Kanan --}}
            @if ($berita->skip(12)->first())
                <div class="sm:col-span-12 lg:col-span-3">
                    <a href="{{ route('berita', $berita->skip(12)->first()->slug) }}">
                        <div class="h-56 bg-cover text-center overflow-hidden"
                            style="background-image: url('{{ asset('storage/' . $berita->skip(12)->first()->thumbnail) }}')"
                            title="{{ $berita->skip(12)->first()->judul }}">
                        </div>
                    </a>
                    <div class="mt-3 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
                        <div class="">
                            <a href="{{ route('berita', $berita->skip(12)->first()->slug) }}"
                                class="text-gray-900 font-bold text-lg mb-2 hover:text-gray-500 transition duration-500 ease-in-out">
                                {{ $berita->skip(12)->first()->judul }}
                            </a>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>

    <!-- Paginasi -->
    <div class="mt-8">
        {{ $berita->links() }}
    </div>
</x-layout>
