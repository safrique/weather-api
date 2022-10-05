<?php

namespace App\Providers;

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
        $this->app->bind(
            'App\Services\Forecasts\Interfaces\Get5DayForecastInterface',
            'App\Services\Forecasts\OpenWeatherMap\Get5DayForecastService'
        );
    }
}
