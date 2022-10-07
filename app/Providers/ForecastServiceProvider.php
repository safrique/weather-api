<?php

namespace App\Providers;

use App\Services\Forecasts\OpenWeatherMap\Get5DayForecastService;
use App\Services\Forecasts\OpenWeatherMap\Interfaces\Get5DayForecastInterface;
use Illuminate\Support\ServiceProvider;

class ForecastServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(Get5DayForecastInterface::class, Get5DayForecastService::class);
    }
}
