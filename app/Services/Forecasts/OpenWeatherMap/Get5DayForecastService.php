<?php

namespace App\Services\Forecasts\OpenWeatherMap;

use App\Helpers\ApiHelpers;
use App\Services\Cities\GetCitiesService;
use App\Services\Forecasts\OpenWeatherMap\Interfaces\Get5DayForecastInterface;
use Exception;
use Illuminate\Support\Facades\Http;

class Get5DayForecastService implements Get5DayForecastInterface
{
    private GetCitiesService $getCitiesService;

    public function __construct(GetCitiesService $getCitiesService) { $this->getCitiesService = $getCitiesService; }

    /**
     * @param string|null $cityName
     *
     * @return array|string
     */
    public function get(?string $cityName = null)
    {
        try {
            if (!($cities = $this->getCitiesService->get($cityName))) {
                return 'No city data found';
            }

            if (is_string($cities)) {
                throw new Exception($cities, 404);
            }

            $forecast = $this->getForecast($cities);
            return $this->cleanForecast($forecast);
        } catch (Exception $e) {
            return 'Error getting 5 day forecast >>> ERROR: ' . $e->getMessage();
        }
    }

    private function getForecast(array $cities)
    : array {
        foreach ($cities as $city) {
            $url = config('open_weather.forecast-endpoint') . '?lat=' . $city['latitude'] . '&lon=' . $city['longitude']
                   . '&units=imperial&appid=' . config('open_weather.key');
            $response = Http::get($url);

            if (ApiHelpers::isSuccessCode($response->status())) {
                $forecastData[] = $response->json();
            }
        }

        return $forecastData ?? [];
    }

    private function cleanForecast(array $forecasts)
    : array {
        foreach ($forecasts as $forecast) {
            $thisForecast = [
                'city'    => $forecast['city']['name'],
                'country' => $forecast['city']['country'],
                'sunrise' => $forecast['city']['sunrise'],
                'sunset'  => $forecast['city']['sunset'],
            ];

            foreach ($forecast['list'] as $item) {
                $thisForecast['forecast'][] = [
                    'date_time'      => $item['dt_txt'],
                    'temp'           => $item['main']['temp'],
                    'feels_like'     => $item['main']['feels_like'],
                    'weather'        => $item['weather'][0]['main'],
                    'description'    => $item['weather'][0]['description'],
                    'wind_speed'     => $item['wind']['speed'],
                    'wind_direction' => $item['wind']['deg'],
                ];
            }

            $returnForecasts[] = $thisForecast;
        }

        return $returnForecasts ?? [];
    }
}
