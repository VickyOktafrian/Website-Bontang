<div class="space-x-10 w-full pt-20 flex items-center justify-start overflow-x-auto overflow-y-hidden ">
    @foreach($pariwisata as $item)
    <!-- Product Card -->
    <article class="w-64 h-80 bg-white rounded-lg shadow-lg overflow-hidden dark:bg-gray-700 flex-shrink-0 hover:scale-105 transition-transform duration-300 flex flex-col ">
        <!-- Image Section -->
        <div class="h-40">
            <img class="object-cover h-full w-full" src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->judul }}" />
        </div>
        
        <!-- Content Section -->
        <div class="flex-grow flex flex-col gap-2 mt-4 px-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-50 whitespace-normal break-words">{{ $item->judul }}</h2>
        </div>

        <!-- Footer Section -->
        <a href="{{ route('wisata', $item->slug) }}" class="w-full space-y-10">
            <div class="p-4 border-t border-gray-200 dark:border-gray-500 bg-gray-50 hover:bg-sky-100 transition-colors flex justify-between items-center font-bold cursor-pointer text-gray-800 dark:text-gray-50">
                <span class="text-base">Check It Out</span>
                <img src="https://cdn-icons-png.flaticon.com/128/54/54366.png" alt="icon" class="w-5 h-5">
            </div>
        </a>
    </article>
    @endforeach
</div>
