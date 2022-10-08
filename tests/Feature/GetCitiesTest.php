<?php

namespace Tests\Feature;

use App\Services\Cities\Interfaces\GetCitiesInterface;
use Tests\TestCase;

class GetCitiesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_cities()
    {
        $service = $this->app->make(GetCitiesInterface::class);
        $this->assertIsArray($service->get());
    }
}
