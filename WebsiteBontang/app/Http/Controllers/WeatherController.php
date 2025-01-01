<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        // Get city from request or default to Bontang
        $city = $request->input('city', 'Bontang');
        $apiKey = config('services.openweathermap.key');
        $baseUrl = config('services.openweathermap.url');

        // Fetch current weather data
        $currentWeatherUrl = "{$baseUrl}/weather?q={$city}&appid={$apiKey}&units=metric";
        // Fetch hourly forecast data
        $forecastUrl = "{$baseUrl}/forecast?q={$city}&appid={$apiKey}&units=metric";

        $client = new Client();

        try {
            // Fetch current weather
            $responseCurrent = $client->get($currentWeatherUrl);
            $weatherData = json_decode($responseCurrent->getBody(), true);

            // Fetch hourly forecast
            $responseForecast = $client->get($forecastUrl);
            $forecastData = json_decode($responseForecast->getBody(), true);
        } catch (\Exception $e) {
            return view('user.prakiraan-cuaca', ['error' => 'Tidak dapat mengambil data cuaca.']);
        }

        // Organize the current weather description
        $description = strtolower($weatherData['weather'][0]['description']);
        $weatherData['weather'][0]['description'] = $this->categorizeWeather($description);

        // Get the current time in WITA timezone
        $currentTimeWita = now()->setTimezone('Asia/Makassar')->format('H:i');

        // Determine time of day based on current hour
        $currentHour = now()->format('H');
        $timeOfDay = '';
        if ($currentHour >= 5 && $currentHour < 9) {
            $timeOfDay = 'Pagi';
        } elseif ($currentHour >= 9 && $currentHour < 15) {
            $timeOfDay = 'Siang';
        } elseif ($currentHour >= 15 && $currentHour < 18) {
            $timeOfDay = 'Sore';
        } elseif ($currentHour >= 18 && $currentHour < 22) {
            $timeOfDay = 'Malam';
        } else {
            $timeOfDay = 'Dini Hari';
        }

        // Organize forecast data by time of day
        $forecast = [
            'pagi' => [
                'temp' => round($forecastData['list'][1]['main']['temp']),
                'description' => $this->categorizeWeather($forecastData['list'][1]['weather'][0]['description']),
            ],
            'siang' => [
                'temp' => round($forecastData['list'][5]['main']['temp']),
                'description' => $this->categorizeWeather($forecastData['list'][5]['weather'][0]['description']),
            ],
            'sore' => [
                'temp' => round($forecastData['list'][10]['main']['temp']),
                'description' => $this->categorizeWeather($forecastData['list'][10]['weather'][0]['description']),
            ],
            'malam' => [
                'temp' => round($forecastData['list'][15]['main']['temp']),
                'description' => $this->categorizeWeather($forecastData['list'][15]['weather'][0]['description']),
            ],
            'diniHari' => [
                'temp' => round($forecastData['list'][20]['main']['temp']),
                'description' => $this->categorizeWeather($forecastData['list'][20]['weather'][0]['description']),
            ]
        ];

        // Organize forecast data for the next 3 days
        $forecastNextDays = [];
        for ($i = 1; $i <= 3; $i++) {
            $forecastNextDays[] = [
                'date' => now()->addDays($i)->translatedFormat('d F Y'),
                'temp' => round($forecastData['list'][$i * 8]['main']['temp']),
                'description' => $this->categorizeWeather($forecastData['list'][$i * 8]['weather'][0]['description']),
            ];
        }

        return view('user.prakiraan-cuaca', [
            'weather' => $weatherData,
            'forecast' => $forecast,
            'forecastNextDays' => $forecastNextDays,
            'title' => 'Prakiraan Cuaca',
            'currentTimeWita' => $currentTimeWita,
            'timeOfDay' => $timeOfDay,
        ]);
    }

    // Function to categorize weather description
    private function categorizeWeather($description)
    {
        $description = strtolower($description);
        if (strpos($description, 'clear') !== false) {
            return 'Cerah';
        } elseif (strpos($description, 'cloud') !== false) {
            return 'Mendung';
        } elseif (strpos($description, 'rain') !== false || strpos($description, 'shower') !== false) {
            return 'Hujan';
        }
        return 'Cerah'; // Default if not detected
    }
}
