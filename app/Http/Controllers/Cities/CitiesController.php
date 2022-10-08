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
    public function search(Request $request, GetCityLocationInterface $service)
    {
        return view('cities', [
            'cities' => $service->get($request->input('city_name'), $request->input('limit') ?: 23),
            'add'    => true,
        ]);
    }

    public function get(GetCitiesInterface $service, ?string $cityName = null)
    {
        return view('cities', ['cities' => $service->get($cityName)]);
    }

    public function store(Request $request, StoreCityService $storeService, City $city, GetCitiesInterface $getService)
    {
        $stored = $storeService->store($request->only($city->getFillable()));
        $data = ['cities' => $getService->get()];

        if (is_string($stored)) {
            $data['error'] = $stored;
        }
        return view('cities', $data);
    }

    public function delete(Request $request, DeleteCityInterface $service, GetCitiesInterface $getService)
    {
        if (!($city = $request->input('city'))) {
            $data=['error' => 'Missing city parameter'];
        }

        if (is_string($deleted = $service->delete($city))) {
            $data['error'] = $deleted;
        }

        $data['cities'] = $getService->get();
        return view('cities', $data);
    }
}
