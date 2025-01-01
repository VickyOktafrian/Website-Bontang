<?php

namespace App\Http\Controllers;

use App\Services\OpenMeteoService; // Mengimpor layanan OpenMeteo untuk mengambil data cuaca

class WeatherController extends Controller
{
    protected $openMeteoService; // Mendeklarasikan properti untuk menyimpan layanan OpenMeteo

    // Konstruktor untuk meng-inject OpenMeteoService ke controller ini
    public function __construct(OpenMeteoService $openMeteoService)
    {
        $this->openMeteoService = $openMeteoService; // Menyimpan instance OpenMeteoService
    }

    // Fungsi untuk menampilkan halaman prakiraan cuaca
    public function index()
    {
        // Koordinat Bontang (lat, long)
        $latitude = 0.1324;
        $longitude = 117.4854;

        // Mengambil data prakiraan cuaca menggunakan layanan OpenMeteo
        $forecast = $this->openMeteoService->getForecast($latitude, $longitude);

        // Mendapatkan data cuaca saat ini, data harian, dan data untuk beberapa hari ke depan
        $currentWeather = $forecast['current'];
        $forecastData = $forecast['daily'];
        $forecastNextDays = $forecast['nextDays'];

        // Membulatkan suhu agar lebih rapi
        $currentWeather['temperature'] = round($currentWeather['temperature']);
        foreach ($forecastData as $key => $dayForecast) {
            $forecastData[$key]['temperature'] = round($dayForecast['temperature']);
        }

        foreach ($forecastNextDays as $key => $dayForecast) {
            $forecastNextDays[$key]['temperature'] = round($dayForecast['temperature']);
        }

        // Menentukan waktu saat ini berdasarkan jam (Pagi, Siang, Sore, Malam, Dini Hari)
        $timeOfDay = $this->getTimeOfDay();

        // Mendapatkan waktu saat ini dalam format 'H:i:s' berdasarkan zona waktu WITA (Asia/Makassar)
        $currentTimeWita = now('Asia/Makassar')->format('H:i:s');

        // Mengirimkan data cuaca dan waktu ke view 'user.prakiraan-cuaca'
        return view('user.prakiraan-cuaca', [
            'title' => 'Prakiraan Cuaca', // Judul halaman
            'weather' => $currentWeather, // Data cuaca saat ini
            'forecast' => $forecastData, // Data prakiraan cuaca harian
            'forecastNextDays' => $forecastNextDays, // Data prakiraan cuaca beberapa hari ke depan
            'timeOfDay' => $timeOfDay, // Waktu saat ini (Pagi/Siang/Sore/Malam)
            'currentTimeWita' => $currentTimeWita, // Waktu saat ini dalam WITA
        ]);
    }

    // Fungsi untuk menentukan waktu berdasarkan jam saat ini
    private function getTimeOfDay()
    {
        $hour = now()->hour; // Mendapatkan jam saat ini

        // Menentukan waktu berdasarkan jam
        if ($hour >= 5 && $hour < 12) {
            return 'Pagi'; // Pagi antara jam 5-11
        } elseif ($hour >= 12 && $hour < 15) {
            return 'Siang'; // Siang antara jam 12-14
        } elseif ($hour >= 15 && $hour < 18) {
            return 'Sore'; // Sore antara jam 15-17
        } elseif ($hour >= 18 && $hour < 24) {
            return 'Malam'; // Malam antara jam 18-23
        } else {
            return 'Dini Hari'; // Dini hari antara jam 0-4
        }
    }
}
