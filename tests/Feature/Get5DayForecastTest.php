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
    public function test_forecast_interface()
    {
        $service = $this->app->make(Get5DayForecastInterface::class);
        $this->assertIsArray($service->get());
    }

    public function test_forecast_api(){
        $response = $this->get('/forecast');
        $response->assertStatus(200);
    }
}
