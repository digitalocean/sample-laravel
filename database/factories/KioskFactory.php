<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

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
            'Account_id' => '01hx8bsgwwqrc3r80yqzas4dvn',
            'MachineID' => fake()->numerify('HC-######'),
            'TradeNO' => fake()->numerify('HCT-######'),
            'KioskName' => fake()->numerify('HC-####'),
            'KioskAddress' => fake()->streetAddress(),
            'Latitude' => fake()->latitude($min = -90, $max = 90),
            'Longitude' => fake()->longitude($min = -180, $max = 180),
        ];
    }
}
