<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'Name' => fake()->name(),
            'Phone' => fake()->phoneNumber(),
            'CompanyName' => fake()->company(),
            'CompanyAddress' => fake()->streetAddress(),
            'City' => fake()->city(),
            'State' => fake()->stateAbbr(),
            'Zip' => fake()->postcode(),
            'WalletAmount' => fake()->numerify('####'),
            'Status' => fake()->randomElement($array = array ('Inactive','Active')),
            'Type' => fake()->randomElement($array = array ('Guest','Member', 'Fanchisee')),
        ];
    }
}
