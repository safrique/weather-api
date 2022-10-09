<?php

namespace Tests\Feature;

use App\Services\Cities\OpenWeatherMap\Interfaces\GetCityLocationInterface;
use Tests\TestCase;

class GetCityLocationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_city_location()
    {
        $service = $this->app->make(GetCityLocationInterface::class);
        $this->assertIsArray($service->get('London'));
    }
}
