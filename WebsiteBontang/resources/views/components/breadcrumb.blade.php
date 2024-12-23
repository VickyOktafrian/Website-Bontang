@props(['title'])

<nav aria-label="breadcrumb" class="w-full">
    <ol class="breadcrumb flex items-center  ">
        <li class="breadcrumb-item">
            <a href="{{ route('beranda') }}" >Beranda</a>
        </li>
        <li class="breadcrumb-item text-gray-600 mx-2">/</li>
        <li class="breadcrumb-item active text-bold text-gray-800" aria-current="page">{{ $title }}</li>
    </ol>
</nav>
