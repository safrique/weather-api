<?php

namespace App\Services\Forecasts\OpenWeatherMap\Interfaces;

interface Get5DayForecastInterface
{
    /**
     * @param string|null $cityName
     *
     * @return array|string
     */
    public function get(?string $cityName = null);
}
