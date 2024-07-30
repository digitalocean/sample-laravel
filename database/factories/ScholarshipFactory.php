<?php

namespace Database\Factories;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Scholarship>
 */
class ScholarshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'partner_id' => Partner::factory(),
            'name' => fake()->company(),
            'deadline' => fake()->date(),
            'description'=> fake()->paragraphs(4, true),
            'award_payments' => fake()->numberBetween($min = 500, $max = 100000),
            'additional_information'=> fake()->paragraphs(2, true),
            'review_applicants'  => fake()->randomElements($array = array ('no', 'yes'), $count = 1),
            'selection_criteria' => fake()->word(),
            'requirement_criteria' => fake()->paragraph(3),
            'award_based_on' => fake()->paragraph(1),
            'renewability' => fake()->randomElements($array = array ('no', 'yes'), $count = 1),
            'uses' => fake()->words(2),
            'fund_amount' => fake()->numberBetween($min = 2000, $max = 400000),
        ];
    }
}
