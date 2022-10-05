<?php

namespace App\Services\Cities\OpenWeatherMap;

use App\Helpers\ApiHelpers;
use App\Services\Cities\Interfaces\GetCityLocationInterface;
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
            ? $this->getCityDetails($response->json())
            : $response->body();
    }

    private function searchCities(string $cityName, int $limit)
    : Response {
        $url = config('open_weather.geocoding-endpoint') . "?q=$cityName&limit=$limit&appid=" . config('open_weather.key');
        return Http::get($url);
    }

    private function getCityDetails(array $cities)
    : array {
        foreach ($cities as $city) {
            $cities[] = [
                'name'      => $city['name'],
                'latitude'  => $city['lat'],
                'longitude' => $city['lon'],
                'country'   => $city['country'],
                'state'     => $city['state'],
            ];
        }

        return $cities;
    }
}
