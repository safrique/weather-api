<?php

namespace App\Services\Cities;

use App\Models\City;
use App\Services\Cities\Interfaces\StoreCityInterface;
use Exception;

class StoreCityService implements StoreCityInterface
{
    private array $cityFillable;
    private City $city;

    public function __construct(City $city)
    {
        $this->city = $city;
        $this->cityFillable = $this->city->getFillable();
    }

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
            return 'Error storing city >>> ERROR: ' . $e->getMessage();
        }
    }

    /**
     * @param array $data
     *
     * @return array|string
     */
    private function validate(array $data)
    {
        foreach ($this->cityFillable as $item) {
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
