<?php

namespace App\Providers;

use App\Services\Cities\DeleteCityService;
use App\Services\Cities\GetCitiesService;
use App\Services\Cities\Interfaces\DeleteCityInterface;
use App\Services\Cities\Interfaces\GetCitiesInterface;
use App\Services\Cities\Interfaces\StoreCityInterface;
use App\Services\Cities\OpenWeatherMap\GetCityLocationService;
use App\Services\Cities\OpenWeatherMap\Interfaces\GetCityLocationInterface;
use App\Services\Cities\StoreCityService;
use Illuminate\Support\ServiceProvider;

class CitiesServiceProvider extends ServiceProvider
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
        $this->app->bind(DeleteCityInterface::class, DeleteCityService::class);
        $this->app->bind(GetCitiesInterface::class, GetCitiesService::class);
        $this->app->bind(GetCityLocationInterface::class, GetCityLocationService::class);
        $this->app->bind(StoreCityInterface::class, StoreCityService::class);
    }
}
