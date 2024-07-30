<?php

namespace Database\Factories;

use App\Models\Scholarship;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'scholarship_id' => Scholarship::factory(),
            'scholarship_id' => Scholarship::factory(),
            'name' => fake()->name(),
            'email' => fake()->unique()->email(),
            'submitted_on' => fake()->date(),
            'phone' => fake()->phoneNumber(),
            'parent_name' => fake()->name(),
            'parent_job' =>fake()->jobTitle(),
            'parent_phone' => fake()->phoneNumber(),
            'parent_email' => fake()->unique()->email(),
            'applicant_essay' => fake()->paragraph(6),
            'community_service' => fake()->words(4),
            'school' =>fake()->company(),
            'graduation_year' => fake()->year($max = '2028') ,
            'gpa' => fake()->numberBetween($min = 1.00, $max = 4.00),
            'sat_Scheduled' => fake()->date(),
            'sat_Score' => fake()->numberBetween($min = 50, $max = 1700),
            'act_scheduled' => fake()->date(),
            'act_score' => fake()->numberBetween($min = 10, $max = 60),
            'ap_test_name' => fake()->catchPhrase(),
            'ap_test_score' => fake()->numberBetween($min = 10, $max = 60),
            'ap_test_name2' => fake()->catchPhrase(),
            'ap_test_score2' => fake()->numberBetween($min = 10, $max = 60),
            'family_income' => fake()->numberBetween($min = 30000, $max = 400000),
            'siblings' => fake()->name(),
            'siblings_attending_college' => fake()->catchPhrase(),
            'fasfa_acknowledgement' => fake()->boolean(true),
            'college_choice' => fake()->catchPhrase(),
            'college_major' => fake()->randomElements($array = array ('math','accounting','doctor','architecture', 'dentist', 'history'), $count = 1),
            'college_status' => fake()->randomElements($array = array ('not applied','pending','accepted'), $count = 1),
            'college_choice2' => fake()->catchPhrase(),
            'college_major2' => fake()->randomElements($array = array ('math','accounting','doctor','architecture', 'dentist', 'history'), $count = 1),
            'college_status2' => fake()->randomElements($array = array ('not applied','pending','accepted'), $count = 1),
            'reference' => fake()->name(),
            'reference_email1' => fake()->unique()->companyEmail(),
            'reference_relationship' => fake()->randomElements($array = array ('volunteer manager','teacher','manager', 'other'), $count = 1),
            'reference2' => fake()->name(),
            'reference_email2' => fake()->unique()->companyEmail(),
            'reference_relationship2' => fake()->randomElements($array = array ('volunteer manager','teacher','manager', 'other'), $count = 1),
            'resume_upload' => fake()->imageUrl($width = 640, $height = 480),
            'essay_upload' => fake()->imageUrl($width = 640, $height = 480),
            'additional_information_upload' => fake()->imageUrl($width = 640, $height = 480),
            'selected' => fake()->randomElements($array = array ('not accepted','pending','accepted'), $count = 1),
            'awarded' => fake()->randomElements($array = array ('0'),),
        ];
    }
}
