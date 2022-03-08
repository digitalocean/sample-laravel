<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                'id'         => 1,
                'name'       => 'Afghanistan',
                'short_code' => 'af',
            ],
            [
                'id'         => 2,
                'name'       => 'Albania',
                'short_code' => 'al',
            ],
            [
                'id'         => 3,
                'name'       => 'Algeria',
                'short_code' => 'dz',
            ],

            // ... Other countries

            [
                'id'         => 239,
                'name'       => 'Zambia',
                'short_code' => 'zm',
            ],
            [
                'id'         => 240,
                'name'       => 'Zimbabwe',
                'short_code' => 'zw',
            ],
        ];
        Country::insert($countries);
    }
}
