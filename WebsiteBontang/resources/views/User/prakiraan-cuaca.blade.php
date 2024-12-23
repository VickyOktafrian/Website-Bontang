<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Bontang, Kalimantan Timur</h1>
        <p>Bontang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>

        <!-- Cuaca Harian -->
        <div class="grid grid-cols-4 gap-4 mb-8">
            <!-- Pagi -->
            <div class="bg-yellow-200 p-4 rounded-lg shadow-md text-center">
                <div class="text-6xl">☀️</div>
                <div class="text-2xl font-bold">26°C</div>
                <div class="text-lg">Cerah</div>
                <div class="text-sm">Pagi</div>
                <div class="text-sm">Terang</div>
            </div>
            <!-- Siang -->
            <div class="bg-yellow-300 p-4 rounded-lg shadow-md text-center">
                <div class="text-6xl">☀️</div>
                <div class="text-2xl font-bold">32°C</div>
                <div class="text-lg">Cerah</div>
                <div class="text-sm">Siang</div>
                <div class="text-sm">Terang</div>
            </div>
            <!-- Malam -->
            <div class="bg-blue-800 text-white p-4 rounded-lg shadow-md text-center">
                <div class="text-6xl">🌙</div>
                <div class="text-2xl font-bold">26°C</div>
                <div class="text-lg">Cerah</div>
                <div class="text-sm">Malam</div>
                <div class="text-sm">Gelap</div>
            </div>
            <!-- Dini Hari -->
            <div class="bg-blue-900 text-white p-4 rounded-lg shadow-md text-center">
                <div class="text-6xl">🌙</div>
                <div class="text-2xl font-bold">25°C</div>
                <div class="text-lg">Udara Kabur</div>
                <div class="text-sm">Dini Hari</div>
                <div class="text-sm">Gelap</div>
            </div>
        </div>

        <!-- Perkiraan Cuaca Mendatang -->
        <div class="grid grid-cols-4 gap-4">
            <!-- Pagi -->
            <div class="p-4 rounded-lg shadow-md text-center">
                <div class="text-6xl">☀️</div>
                <div class="text-2xl font-bold">26°C</div>
                <div class="text-lg">Cerah</div>
                <div class="text-sm">Pagi</div>
                <div class="text-sm mt-2 " id="time"></div>
            </div>
            @for ($i = 1; $i <= 3; $i++)
                <div class="p-4 rounded-lg shadow-md text-center">
                    <div class="text-6xl">🌦️</div>
                    <div class="text-sm mt-2">{{ \Carbon\Carbon::now()->addDays($i)->translatedFormat('d F Y') }}</div>
                    <div class="text-sm mt-2">Terang</div>
                </div>
            @endfor
        </div>
    </div>

    <script>
        // Fungsi untuk memperbarui waktu real-time
        function updateTime() {
            const options = { hour: '2-digit', minute: '2-digit' };
            document.getElementById('time').textContent = new Date().toLocaleTimeString('id-ID', options);
        }

        // Jalankan fungsi setiap detik
        setInterval(updateTime, 1000);
        updateTime();
    </script>
</x-layout>
