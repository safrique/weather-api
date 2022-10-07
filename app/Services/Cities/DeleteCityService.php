<?php

namespace App\Services\Cities;

use App\Models\City;

class DeleteCityService
{
    public function delete(string $city)
    : int {
        return City::where('city', $city)->delete();
    }
}
