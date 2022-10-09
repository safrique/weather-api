<?php

namespace App\Services\Cities;

use App\Helpers\CityHelpers;
use App\Models\City;
use App\Services\Cities\Interfaces\GetCitiesInterface;

class GetCitiesService implements GetCitiesInterface
{
    /**
     * @param string|null $cityName
     *
     * @return array|string
     */
    public function get(?string $cityName = null)
    {
        if ($cityName) {
            return ($city = City::where('city', $cityName)->first())
                ? CityHelpers::getCityDetails([$city->toArray()])
                : "City '$cityName' not found";
        }

        return City::exists() ? CityHelpers::getCityDetails(City::all()->toArray()) : [];
    }
}
