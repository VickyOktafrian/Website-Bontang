<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenMeteoService
{
    // Fungsi untuk mendapatkan prakiraan cuaca
    public function getForecast($latitude, $longitude)
    {
        $url = "https://api.open-meteo.com/v1/forecast"; // URL API OpenMeteo untuk cuaca

        // Mengirimkan request GET ke API OpenMeteo
        $response = Http::get($url, [
            'latitude' => $latitude, // Koordinat lintang
            'longitude' => $longitude, // Koordinat bujur
            'hourly' => 'temperature_2m,weathercode', // Data cuaca per jam
            'daily' => 'temperature_2m_max,temperature_2m_min,weathercode', // Data cuaca per hari
            'current_weather' => true, // Mendapatkan cuaca saat ini
            'timezone' => 'auto', // Menyesuaikan zona waktu secara otomatis
        ]);

        $data = $response->json(); // Mengubah response menjadi array JSON

        return [
            // Data cuaca saat ini
            'current' => [
                'temperature' => $data['current_weather']['temperature'], // Suhu saat ini
                'description' => $this->getWeatherDescription($data['current_weather']['weathercode']), // Deskripsi cuaca saat ini
            ],
            // Data cuaca harian
            'daily' => [
                'pagi' => [
                    'temperature' => $data['daily']['temperature_2m_min'][0], // Suhu pagi
                    'description' => $this->getWeatherDescription($data['daily']['weathercode'][0]), // Deskripsi cuaca pagi
                ],
                'siang' => [
                    'temperature' => $data['daily']['temperature_2m_max'][0], // Suhu siang
                    'description' => $this->getWeatherDescription($data['daily']['weathercode'][0]), // Deskripsi cuaca siang
                ],
                'sore' => [
                    'temperature' => $data['daily']['temperature_2m_max'][0] - 2, // Suhu sore (dikurangi 2°C)
                    'description' => $this->getWeatherDescription($data['daily']['weathercode'][0]), // Deskripsi cuaca sore
                ],
                'malam' => [
                    'temperature' => $data['daily']['temperature_2m_min'][0] + 1, // Suhu malam (ditambah 1°C)
                    'description' => $this->getWeatherDescription($data['daily']['weathercode'][0]), // Deskripsi cuaca malam
                ],
                'diniHari' => [
                    'temperature' => $data['daily']['temperature_2m_min'][0], // Suhu dini hari
                    'description' => $this->getWeatherDescription($data['daily']['weathercode'][0]), // Deskripsi cuaca dini hari
                ],
            ],
            // Data cuaca untuk beberapa hari ke depan
            'nextDays' => collect($data['daily']['temperature_2m_max']) // Mengambil suhu maksimal dari hari berikutnya
                ->take(7) // Ambil 7 hari ke depan
                ->map(function ($temp, $index) use ($data) {
                    // Format data cuaca untuk hari-hari berikutnya
                    return [
                        'date' => now()->addDays($index)->format('d F Y'), // Tanggal hari berikutnya
                        'temperature' => $temp, // Suhu maksimal
                        'description' => $this->getWeatherDescription($data['daily']['weathercode'][$index]), // Deskripsi cuaca
                    ];
                })->toArray(), // Mengubah koleksi ke array
        ];
    }

    // Fungsi untuk mendapatkan deskripsi cuaca berdasarkan kode cuaca
    private function getWeatherDescription($weatherCode)
    {
        // Menentukan deskripsi cuaca berdasarkan kode cuaca yang diberikan
        if (in_array($weatherCode, [0, 1])) {
            return 'Cerah'; // Cuaca cerah
        } elseif (in_array($weatherCode, [2, 3, 45, 48])) {
            return 'Mendung'; // Cuaca mendung
        } elseif (in_array($weatherCode, [51, 61, 63, 65, 80, 81, 82, 95, 96, 99])) {
            return 'Hujan'; // Cuaca hujan
        }

        return 'Tidak diketahui'; // Jika kode cuaca tidak dikenali
    }
}
