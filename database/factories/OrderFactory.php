<?php

namespace Database\Factories;

use App\Models\Kiosk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kiosk_id' => Kiosk::factory(),
            'OrderNumber' => fake()->numerify('HC-#######'),
            'MealName' => fake()->word(),
            'Category' => fake()->randomElement($array = array ('american','Indian','Asian')),
            'SessionCode' => fake()->numerify('#######'),
            'SlotNO' => fake()->numerify('##'),
            'Amount' => '12.50',
            'Discount' => '0',
            'ProductID' => fake()->numerify('HCP-######'),
            'Status' => '1',
            'Time' => fake()->dateTime($max = 'now'),
            'QrCode' => 'none',
            'Code' => fake()->numerify('#######'),
           
        ];
    }
}
