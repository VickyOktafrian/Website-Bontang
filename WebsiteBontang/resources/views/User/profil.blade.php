<x-layout>
<x-slot:title>{{ $title }}</x-slot:title>
<body class="bg-gray-100 font-sans">

    <div class="max-w-4xl mx-auto my-10 p-6 bg-white shadow-lg rounded-lg">
        <div class="flex items-center space-x-6">
            <!-- Foto Profil -->
            <div class="w-24 h-24">
                <img src="https://via.placeholder.com/150" alt="Foto Profil" class="w-full h-full rounded-full object-cover">
            </div>
            
            <!-- Informasi Profil -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">Nama Pengguna</h2>
                <p class="text-gray-500 mt-2">email@example.com</p>
            </div>
        </div>

        <!-- Biodata -->
        <div class="mt-6">
            <h3 class="text-xl font-semibold text-gray-800">Biodata</h3>
            <p class="mt-2 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vehicula neque non eros volutpat, a dignissim orci efficitur.</p>
        </div>

        <!-- Kontak -->
        <div class="mt-6">
            <h3 class="text-xl font-semibold text-gray-800">Kontak</h3>
            <p class="mt-2 text-gray-600">Telepon: 08123456789</p>
            <p class="text-gray-600">Alamat: Jalan Raya No. 123, Kota ABC</p>
        </div>
    </div>

</body>
</x-layout>