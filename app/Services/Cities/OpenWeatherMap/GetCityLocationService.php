<?php

namespace App\Services\Cities\OpenWeatherMap;

use App\Helpers\ApiHelpers;
use App\Helpers\CityHelpers;
use App\Services\Cities\OpenWeatherMap\Interfaces\GetCityLocationInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class GetCityLocationService implements GetCityLocationInterface
{
    /**
     * @param string $cityName
     * @param int    $limit
     *
     * @return array|string
     */
    public function get(string $cityName, int $limit = 5)
    {
        $response = $this->searchCities($cityName, $limit);
        return ApiHelpers::isSuccessCode($response->status())
            ? CityHelpers::getCityDetails($response->json())
            : $response->body();
    }

    private function searchCities(string $cityName, int $limit)
    : Response {
        $url = config('open_weather.geocoding-endpoint') . "?q=$cityName&limit=$limit&appid=" . config('open_weather.key');
        return Http::get($url);
    }
}
