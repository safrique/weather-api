<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class Get5DayForecastCommandTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_success_outcome()
    {
        $command = Artisan::call('forecast:get-5-day --city=London --test=true');
        $this->assertEquals(0, $command);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_fail_outcome()
    {
        $command = Artisan::call('forecast:get-5-day --city=SomeNonExistentCity --test=true');
        $this->assertEquals(1, $command);
    }
}
