<?php

namespace App\Http\Controllers\Forecasts;

use App\Http\Controllers\Controller;
use App\Services\Forecasts\OpenWeatherMap\Interfaces\Get5DayForecastInterface;

class Forecast5DayController extends Controller
{
    public function get5DayForecast(Get5DayForecastInterface $service, ?string $city = null)
    {
//        if ()
        $forecast = $service->get($city);
        return view('forecast_5day', [(is_string($forecast) ? 'error' : 'forecasts') => $forecast]);
    }
}
