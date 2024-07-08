<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\Account;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class KioskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Account_id' => '01j1t57bztgvxm6k78j7wncja5',
            'MachineID' => fake()->numerify('HC-######'),
            'TradeNO' => fake()->numerify('HCT-######'),
            'KioskType' => fake()->randomElement($array = array ('Small','Large')),
            'KioskNumber' => fake()->numerify('HC-####'),
            'KioskAddress' => fake()->streetAddress(),
            'City' => fake()->city(),
            'State' => fake()->stateAbbr(),
            'Zip' => fake()->postcode(),
            'Latitude' => fake()->latitude($min = -90, $max = 90),
            'Longitude' => fake()->longitude($min = -180, $max = 180),
            'Status' => fake()->randomElement($array = array ('Inactive','Active', 'offLine')),
            'TotalMeals' => fake()->numerify('##'),
            'TotalSold' => fake()->numerify('##'),
        ];
    }
}
