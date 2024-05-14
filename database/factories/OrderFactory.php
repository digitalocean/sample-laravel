<?php

namespace Database\Factories;

use App\Models\Kiosk;
use App\Models\Account;
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
            'MealName' => fake()->randomElement($array = array ('Beef Brisket','BBQ Pulled Pork Sandwich','Blackened Catfish','Mac & Cheese')),
            'Category' => fake()->randomElement($array = array ('american','Indian','Asian')),
            'SessionCode' => fake()->numerify('#######'),
            'SlotNO' => fake()->numerify('##'),
            'Amount' => '12.50',
            'Discount' => '0',
            'ProductID' => fake()->numerify('HCP-######'),
            'Status' => '1',
            'Time' => fake()->dateTime($max = 'now'),
            'Member' => fake()->randomElement($array = array ('Guest','Member')),
            'Account_id' => Account::factory(),
            'Quantity' => '1',
            'QrCode' => 'none',
            'Code' => fake()->numerify('#######'),
            'PaymentStatus' => fake()->randomElement($array = array ('Paid','Pending', 'Cancled')),
        ];
    }
}
