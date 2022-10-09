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
        $command = Artisan::call($this->getCommand('London'));
        $this->assertEquals(0, $command);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_fail_outcome()
    {
        $command = Artisan::call($this->getCommand('SomeNonExistentCity'));
        $this->assertEquals(1, $command);
    }

    private function getCommand(string $city)
    : string {
        return "forecast:get-5-day --city=$city --test=true";
    }
}
