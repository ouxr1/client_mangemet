<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'full_name' => fake()->name(),
            'Position' => fake()->jobTitle(),
            'company_name' => fake()->company(),
            'phone_number' => fake()->phoneNumber(),
            'linkedin_profile' => fake()->url(),
            'country'=>fake()->country(),
            'purchase'=>fake()->colorName(),
            'interested'=>fake()->boolean(),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
