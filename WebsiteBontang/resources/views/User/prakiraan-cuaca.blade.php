<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4 text-center">Bontang, Kalimantan Timur</h1>
        <p class="text-center text-lg mb-6">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>

        <div class="p-6 rounded-lg shadow-md text-center bg-white mb-8">
            <h2 class="text-3xl font-bold mb-4 text-center">Cuaca Sekarang</h2>

            <div class="text-sm text-gray-500 mt-2">{{ $timeOfDay }}</div>
            <div class="text-sm text-gray-500 mt-2 mb-5" id="time">{{ $currentTimeWita }}</div>
            <div class="text-4xl font-bold">{{ round($weather['temperature']) }}°C</div>
            <div class="text-lg text-gray-700">{{ $weather['description'] }}</div>
        </div>

        <!-- Cuaca Harian -->
        <div class="flex flex-wrap justify-between  ">
            <!-- Pagi -->
            <div class="p-4 rounded-lg text-center w-1/3 lg:w-1/5 mb-8 " style="background-image: url('{{ asset('images/pagi/' . strtolower($forecast['pagi']['description']) . '.png') }}'); background-size: cover; background-position: center; min-height: 300px;">
                <div class="text-2xl p-1 text-white mb-40">Pagi</div>
                <div class="text-2xl font-bold text-white">{{ $forecast['pagi']['temperature'] }}°C</div>
                <div class="text-lg text-white">{{ $forecast['pagi']['description'] }}</div>
            </div>
            <!-- Siang -->
            <div class="p-4 rounded-lg  text-center w-1/3 lg:w-1/5 mb-8" style="background-image: url('{{ asset('images/siang/' . strtolower($forecast['siang']['description']) . '.png') }}'); background-size: cover; background-position: center; min-height: 300px;">
                <div class="text-2xl text-white mb-40 p-1">Siang</div>
                <div class="text-2xl font-bold text-white">{{ $forecast['siang']['temperature'] }}°C</div>
                <div class="text-lg text-white">{{ $forecast['siang']['description'] }}</div>
            </div>
            <!-- Sore -->
            <div class="p-4 rounded-lg  text-center w-1/3 lg:w-1/5 mb-8" style="background-image: url('{{ asset('images/sore/' . strtolower($forecast['sore']['description']) . '.png') }}'); background-size: cover; background-position: center; min-height: 300px;">
                <div class="text-xl text-white mb-40 p-1">Sore</div>
                <div class="text-2xl font-bold text-white">{{ $forecast['sore']['temperature'] }}°C</div>
                <div class="text-lg text-white">{{ $forecast['sore']['description'] }}</div>
            </div>
            <!-- Malam -->
            <div class="p-4 rounded-lg  text-center w-1/3 lg:w-1/5 mb-8" style="background-image: url('{{ asset('images/malam/' . strtolower($forecast['malam']['description']) . '.png') }}'); background-size: cover; background-position: center; min-height: 300px;">
                <div class="text-2xl mb-40 p-1 text-white">Malam</div>
                <div class="text-2xl font-bold text-white">{{ $forecast['malam']['temperature'] }}°C</div>
                <div class="text-lg text-white">{{ $forecast['malam']['description'] }}</div>
            </div>
            <!-- Dini Hari -->
            <div class="p-4 rounded-lg  text-center w-1/3 lg:w-1/5 mb-8" style="background-image: url('{{ asset('images/diniHari/' . strtolower($forecast['diniHari']['description']) . '.png') }}'); background-size: cover; background-position: center; min-height: 300px;">
                <div class="text-2xl mb-40 p-1 text-white">Dini Hari</div>
                <div class="text-2xl font-bold text-white">{{ $forecast['diniHari']['temperature'] }}°C</div>
                <div class="text-lg text-white">{{ $forecast['diniHari']['description'] }}</div>
            </div>
        </div>

        <!-- Perkiraan Cuaca Mendatang -->
        <div class="flex flex-wrap justify-between mb-8">
            @foreach ($forecastNextDays as $forecastDay)
                <div class="p-4 rounded-lg shadow-md text-center bg-white w-1/7 mb-8">
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
