<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4 text-center">Bontang, Kalimantan Timur</h1>
        <p class="text-center text-lg mb-6">Bontang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
        <div class="p-6 rounded-lg shadow-md text-center bg-white mb-8">
            <div class="text-6xl text-yellow-500">☀️</div>
            <div class="text-4xl font-bold">{{ round($weather['temperature']) }}°C</div>
            <div class="text-lg text-gray-700">{{ $weather['description'] }}</div>
            <div class="text-sm text-gray-500 mt-2">{{ $timeOfDay }}</div>
            <div class="text-sm text-gray-500 mt-2" id="time">{{ $currentTimeWita }}</div>
        </div>

        <!-- Cuaca Harian -->
        <div class="flex justify-between space-x-6 mb-8">
            <!-- Pagi -->
            <div class="bg-yellow-200 p-4 rounded-lg shadow-md text-center w-1/5">
                <div class="text-6xl text-yellow-500">☀️</div>
                <div class="text-2xl font-bold">{{ $forecast['pagi']['temperature'] }}°C</div>
                <div class="text-lg text-gray-700">{{ $forecast['pagi']['description'] }}</div>
                <div class="text-sm text-gray-500">Pagi</div>
            </div>
            <!-- Siang -->
            <div class="bg-yellow-300 p-4 rounded-lg shadow-md text-center w-1/5">
                <div class="text-6xl text-yellow-500">☀️</div>
                <div class="text-2xl font-bold">{{ $forecast['siang']['temperature'] }}°C</div>
                <div class="text-lg text-gray-700">{{ $forecast['siang']['description'] }}</div>
                <div class="text-sm text-gray-500">Siang</div>
            </div>
            <!-- Sore -->
            <div class="bg-orange-300 p-4 rounded-lg shadow-md text-center w-1/5">
                <div class="text-6xl text-orange-500">🌤️</div>
                <div class="text-2xl font-bold">{{ $forecast['sore']['temperature'] }}°C</div>
                <div class="text-lg text-gray-700">{{ $forecast['sore']['description'] }}</div>
                <div class="text-sm text-gray-500">Sore</div>
            </div>
            <!-- Malam -->
            <div class="bg-blue-800 text-white p-4 rounded-lg shadow-md text-center w-1/5">
                <div class="text-6xl">🌙</div>
                <div class="text-2xl font-bold">{{ $forecast['malam']['temperature'] }}°C</div>
                <div class="text-lg">{{ $forecast['malam']['description'] }}</div>
                <div class="text-sm">Malam</div>
            </div>
            <!-- Dini Hari -->
            <div class="bg-blue-900 text-white p-4 rounded-lg shadow-md text-center w-1/5">
                <div class="text-6xl">🌙</div>
                <div class="text-2xl font-bold">{{ $forecast['diniHari']['temperature'] }}°C</div>
                <div class="text-lg">{{ $forecast['diniHari']['description'] }}</div>
                <div class="text-sm">Dini Hari</div>
            </div>
        </div>

        <!-- Perkiraan Cuaca Mendatang -->
        <div class="flex justify-between space-x-6">
            @foreach ($forecastNextDays as $forecastDay)
                <div class="p-4 rounded-lg shadow-md text-center bg-white w-1/3">
                    <div class="text-xl font-bold">{{ $forecastDay['date'] }}</div>
                    <div class="text-2xl font-bold">{{ $forecastDay['temperature'] }}°C</div>
                    <div class="text-lg text-gray-700">{{ $forecastDay['description'] }}</div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // Fungsi untuk memperbarui waktu secara dinamis dalam WITA
        setInterval(function() {
            var currentTime = new Date();
            var options = { 
                timeZone: 'Asia/Makassar', 
                hour: '2-digit', 
                minute: '2-digit', 
                second: '2-digit',
                hour12: false 
            };

            var timeString = new Intl.DateTimeFormat('id-ID', options).format(currentTime);

            document.getElementById('time').textContent = timeString;
        }, 1000); // Setiap 1000ms (1 detik)
    </script>
</x-layout>
