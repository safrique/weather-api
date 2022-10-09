<?php

namespace Tests\Unit;

use App\Services\Cities\StoreCityService;
use Illuminate\Contracts\Container\BindingResolutionException;
use PHPUnit\Framework\TestCase;

class StoreCityTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function test_validate()
    {
        $data = [
            'city'     => 'Test City',
            'country'  => 'TC',
            'state'    => 'Test State',
            'latitude' => 23,
            // 'longitude'=>13, // Commented out on purpose to force validate method to fail
        ];
        $response= app()->make(StoreCityService::class)->store($data);
        $this->assertIsString($response);
    }
}
