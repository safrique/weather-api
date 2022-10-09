<?php

namespace App\Services\Cities\Interfaces;

interface GetCitiesInterface
{
    /**
     * @param string|null $cityName
     *
     * @return array|string
     */
    public function get(?string $cityName = null);
}
