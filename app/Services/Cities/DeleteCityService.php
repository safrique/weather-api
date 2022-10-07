<?php

namespace App\Services\Cities;

use App\Models\City;
use App\Services\Cities\Interfaces\DeleteCityInterface;

class DeleteCityService implements DeleteCityInterface
{
    public function delete(string $city)
    : int {
        return City::where('city', $city)->delete();
    }
}
