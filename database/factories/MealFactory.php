<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Cuisine' => fake()->randomElement($array = array ('Beef Brisket','BBQ Pulled Pork Sandwich','Blackened Catfish','Mac & Cheese')),
            'Category' => fake()->randomElement($array = array ('american','Indian','Asian')),
            'Calories' => fake()->numerify('###'),
            'Description' => fake()->paragraph(3),
            'Price' => '12.50',
            'NutritionalValue' => fake()->numerify('###'),
            'MealType' => 'Dinner', 
        ];

    }
}
