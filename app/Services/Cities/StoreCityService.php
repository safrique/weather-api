<?php

namespace App\Services\Cities;

use App\Models\City;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;

class StoreCityService
{
    /**
     * @param array $data
     *
     * @return array|string
     */
    public function store(array $data)
    {
        try {
            return is_string($validate = $this->validate($data)) ? $validate : $this->save($validate);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param array $data
     *
     * @return array|string
     */
    private function validate(array $data)
    {
        foreach (app()->make(City::class)->getFillable() as $item) {
            if (empty($data[$item])) {
                return "Missing required $item parameter";
            }

            $return_data[$item] = $data[$item];
        }

        return $return_data ?? [];
    }

    private function save(array $data)
    : array {
        return City::updateOrCreate($data)->toArray();
    }
}
