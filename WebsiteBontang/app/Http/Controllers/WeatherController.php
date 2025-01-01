<?php

namespace App\Http\Controllers;

use App\Services\OpenMeteoService;

class WeatherController extends Controller
{
    protected $openMeteoService;

    public function __construct(OpenMeteoService $openMeteoService)
    {
        $this->openMeteoService = $openMeteoService;
    }

    public function index()
    {
        $latitude = 0.1324; // Lokasi Bontang
        $longitude = 117.4854;

        $forecast = $this->openMeteoService->getForecast($latitude, $longitude);

        // Menyusun data untuk mengirim ke view
        $currentWeather = $forecast['current'];
        $forecastData = $forecast['daily'];
        $forecastNextDays = $forecast['nextDays'];

        // Pembulatan suhu
        $currentWeather['temperature'] = round($currentWeather['temperature']);
        foreach ($forecastData as $key => $dayForecast) {
            $forecastData[$key]['temperature'] = round($dayForecast['temperature']);
        }

        foreach ($forecastNextDays as $key => $dayForecast) {
            $forecastNextDays[$key]['temperature'] = round($dayForecast['temperature']);
        }

        // Menentukan waktu berdasarkan jam
        $timeOfDay = $this->getTimeOfDay();
        $currentTimeWita = now('Asia/Makassar')->format('H:i:s');

        return view('user.prakiraan-cuaca', [
            'title' => 'Prakiraan Cuaca',
            'weather' => $currentWeather,
            'forecast' => $forecastData,
            'forecastNextDays' => $forecastNextDays,
            'timeOfDay' => $timeOfDay,
            'currentTimeWita' => $currentTimeWita,
        ]);
    }

    private function getTimeOfDay()
    {
        $hour = now()->hour;

        if ($hour >= 5 && $hour < 12) {
            return 'Pagi';
        } elseif ($hour >= 12 && $hour < 15) {
            return 'Siang';
        } elseif ($hour >= 15 && $hour < 18) {
            return 'Sore';
        } elseif ($hour >= 18 && $hour < 24) {
            return 'Sore';
        } else {
            return 'Dini Hari';
        }
    }
}
