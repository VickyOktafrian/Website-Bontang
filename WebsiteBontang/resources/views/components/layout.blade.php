<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
</head>
<body class="h-full bg-gray-100">

    {{-- Header section --}}
    @auth
        <!-- Header for logged in users -->
        <x-header_sdh_login class="fixed"></x-header_sdh_login>
    @else
        <!-- Header for non-logged in users -->
        <x-header_blm_login class="fixed"></x-header_blm_login>
    @endauth
    
    <main class="mt-28">

        @if(request()->route()->getName() !== 'beranda' && request()->route()->getName() !== 'berita' && request()->route()->getName() !== 'wisata') 
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <x-breadcrumb :title="$title" />
            </div>
        @endif
    
        <!-- Main Content -->
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>

    {{-- Footer section --}}
    <footer>
        <x-footer></x-footer>
    </footer>

</body>
</html>
