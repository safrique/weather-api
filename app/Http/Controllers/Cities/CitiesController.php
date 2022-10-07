<?php

namespace App\Http\Controllers\Cities;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Services\Cities\Interfaces\DeleteCityInterface;
use App\Services\Cities\Interfaces\GetCitiesInterface;
use App\Services\Cities\OpenWeatherMap\Interfaces\GetCityLocationInterface;
use App\Services\Cities\StoreCityService;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    // TODO: Create views to return instead of Services

    public function search(string $cityName, int $limit = 5, GetCityLocationInterface $service)
    {
        return $service->get($cityName, $limit);
    }

    public function get(?string $cityName = null, GetCitiesInterface $service) { return $service->get($cityName); }

    public function store(Request $request, StoreCityService $service, City $city)
    {
        return $service->store($request->only($city->getFillable()));
    }

    public function delete(string $cityName, DeleteCityInterface $service)
    {
        return $service->delete($cityName);
    }
}
