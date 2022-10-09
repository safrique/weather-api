<?php

namespace Tests\Feature;

use App\Services\Forecasts\OpenWeatherMap\Interfaces\Get5DayForecastInterface;
use Tests\TestCase;

class Get5DayForecastTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_forecast()
    {
        $service = $this->app->make(Get5DayForecastInterface::class);
        $this->assertIsArray($service->get());
    }
}
