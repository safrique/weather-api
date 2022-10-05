<?php

namespace App\Services\Cities;

use App\Models\City;

class GetCitiesService
{
    public function get(?string $city = null)
    : array {
        if ($city) {
            return ($city = City::where('city', $city)->first()) ? $city->toArray() : [];
        }

        return City::exists() ? City::all()->toArray() : [];
    }
}
