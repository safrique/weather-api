<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('constants.cities') as $id => $city) {
            City::updateOrCreate(['id' => $id, 'city' => $city['city'], 'country' => $city['country'], 'state' => $city['state']],
                ['latitude' => $city['latitude'], 'longitude' => $city['longitude']]);
        }
    }
}
