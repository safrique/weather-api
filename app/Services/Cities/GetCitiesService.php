<?php

namespace App\Services\Cities;

use App\Helpers\CityHelpers;
use App\Models\City;
use App\Services\Cities\Interfaces\GetCitiesInterface;

class GetCitiesService implements GetCitiesInterface
{
    public function get(?string $city = null)
    : array {
        if ($city && ($city = City::where('city', $city)->first())) {
            $cities[] = $city->toArray();
            return CityHelpers::getCityDetails($cities);
        }

        return City::exists() ? CityHelpers::getCityDetails(City::all()->toArray()) : [];
    }
}
