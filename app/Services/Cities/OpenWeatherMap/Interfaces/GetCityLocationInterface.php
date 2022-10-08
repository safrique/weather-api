<?php

namespace App\Services\Cities\OpenWeatherMap\Interfaces;

interface GetCityLocationInterface
{
    /**
     * @param string $cityName
     * @param int    $limit
     *
     * @return array|string
     */
    public function get(string $cityName, int $limit = 23);
}
