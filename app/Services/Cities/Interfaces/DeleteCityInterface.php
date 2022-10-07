<?php

namespace App\Services\Cities\Interfaces;

interface DeleteCityInterface
{
    public function delete(string $city)
    : int;
}
