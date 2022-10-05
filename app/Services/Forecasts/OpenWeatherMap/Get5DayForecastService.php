<?php

namespace App\Services\Forecasts\OpenWeatherMap;

use App\Helpers\ApiHelpers;
use App\Services\Cities\GetCitiesService;
use App\Services\Forecasts\Interfaces\Get5DayForecastInterface;
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
        return ($cities = $this->getCitiesService->get($cityName)) ? $this->getForecast($cities) : 'No cities found';
    }

    private function getForecast(array $cities)
    : array {
        foreach ($cities as $city) {
            $url = config('open_weather.forecast-endpoint') . '?lat=' . $city['latitude'] . '&lon=' . $city['longitude']
                   . '&appid=' . config('open_weather.key');
            $response = Http::get($url);

            if (ApiHelpers::isSuccessCode($response->status())) {
                $forecastData[] = $response->json();
            }
        }

        return $forecastData ?? [];
    }
}
