<?php

namespace App\Services\Cities;

use App\Models\City;
use App\Services\Cities\Interfaces\GetCitiesInterface;

class GetCitiesService implements GetCitiesInterface
{
    public function get(?string $city = null)
    : array {
        if ($city) {
            return ($city = City::where('city', $city)->first()) ? $city->toArray() : [];
        }

        return City::exists() ? City::all()->toArray() : [];
    }
}
