<?php

namespace App\Helpers;

class CityHelpers
{
    public static function getCityDetails(array $cities)
    : array {
        foreach ($cities as $city) {
            $returnCities[] = [
                'city'      => $city['name'] ?? $city['city'],
                'latitude'  => $city['lat'] ?? $city['latitude'],
                'longitude' => $city['lon'] ?? $city['longitude'],
                'country'   => $city['country'],
                'state'     => $city['state'],
            ];
        }

        return $returnCities ?? [];
    }
}
