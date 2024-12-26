<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!-- Container -->
    <div class="relative flex flex-col items-center mx-auto lg:flex-row lg:max-w-5xl xl:max-w-6xl px-4">

        <!-- Image Column -->
        <div class="w-full h-64 lg:w-1/2 lg:h-auto">
            <img class="h-full w-full object-cover" src="{{ asset('storage/' . $wisata->thumbnail) }}" alt="{{ $wisata->judul }}">
        </div>
        <!-- Close Image Column -->

        <!-- Text Column -->
        <div class="max-w-lg bg-white md:max-w-2xl md:z-10 md:shadow-lg md:absolute md:top-0 md:mt-48 lg:w-3/5 lg:left-0 lg:mt-20 lg:ml-20 xl:mt-24 xl:ml-12">
            <!-- Text Wrapper -->
            <div class="flex flex-col p-6 md:px-8 lg:p-12">
                <h2 class="text-2xl font-medium uppercase text-green-800 lg:text-4xl">{{ $wisata->judul }}</h2>
                <div class="mt-4">
                    {!! $wisata->isi !!}
                </div>
            </div>
            <!-- Close Text Wrapper -->
        </div>
        <!-- Close Text Column -->

    </div>
</x-layout>
