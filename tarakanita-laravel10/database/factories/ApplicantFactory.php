<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'graduated_from' => $this->faker->company() . ' University',
            'gpa_score' => $this->faker->randomFloat(2, 2.50, 4.00),
            'portofolio_notes' => $this->faker->sentence(),
        ];
    }
}
