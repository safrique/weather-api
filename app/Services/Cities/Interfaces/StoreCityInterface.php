<?php

namespace App\Services\Cities\Interfaces;

interface StoreCityInterface
{
    /**
     * @param array $data
     *
     * @return array|string
     */
    public function store(array $data);
}
