<?php

namespace App\Services\Cities\Interfaces;

interface GetCitiesInterface
{
    public function get(?string $city = null)
    : array;
}
