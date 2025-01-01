<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenMeteoService
{
    public function getForecast($latitude, $longitude)
    {
        $url = "https://api.open-meteo.com/v1/forecast";
        $response = Http::get($url, [
            'latitude' => $latitude,
            'longitude' => $longitude,
            'hourly' => 'temperature_2m,weathercode',
            'daily' => 'temperature_2m_max,temperature_2m_min,weathercode',
            'current_weather' => true,
            'timezone' => 'auto',
        ]);

        $data = $response->json();

        return [
            'current' => [
                'temperature' => $data['current_weather']['temperature'],
                'description' => $this->getWeatherDescription($data['current_weather']['weathercode']),
            ],
            'daily' => [
                'pagi' => [
                    'temperature' => $data['daily']['temperature_2m_min'][0],
                    'description' => $this->getWeatherDescription($data['daily']['weathercode'][0]),
                ],
                'siang' => [
                    'temperature' => $data['daily']['temperature_2m_max'][0],
                    'description' => $this->getWeatherDescription($data['daily']['weathercode'][0]),
                ],
                'sore' => [
                    'temperature' => $data['daily']['temperature_2m_max'][0] - 2,
                    'description' => $this->getWeatherDescription($data['daily']['weathercode'][0]),
                ],
                'malam' => [
                    'temperature' => $data['daily']['temperature_2m_min'][0] + 1,
                    'description' => $this->getWeatherDescription($data['daily']['weathercode'][0]),
                ],
                'diniHari' => [
                    'temperature' => $data['daily']['temperature_2m_min'][0],
                    'description' => $this->getWeatherDescription($data['daily']['weathercode'][0]),
                ],
            ],
            'nextDays' => collect($data['daily']['temperature_2m_max'])
                ->take(7) // Hanya ambil 3 hari ke depan
                ->map(function ($temp, $index) use ($data) {
                    return [
                        'date' => now()->addDays($index)->format('d F Y'),
                        'temperature' => $temp,
                        'description' => $this->getWeatherDescription($data['daily']['weathercode'][$index]),
                    ];
                })->toArray(),
        ];
    }

    private function getWeatherDescription($weatherCode)
    {
        if (in_array($weatherCode, [0, 1])) {
            return 'Cerah';
        } elseif (in_array($weatherCode, [2, 3, 45, 48])) {
            return 'Mendung';
        } elseif (in_array($weatherCode, [51, 61, 63, 65, 80, 81, 82, 95, 96, 99])) {
            return 'Hujan';
        }

        return 'Tidak diketahui';
    }
}
