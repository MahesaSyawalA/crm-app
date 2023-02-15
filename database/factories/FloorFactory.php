<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Floor>
 */
class FloorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_building' => fake()->randomDigitNotNull(),
            'code_floor' => fake()->unique()->numerify('L####'),
            'name_floor' => fake()->regexify('Lantai [1-9]'),
            'monthly_price' => fake()->numberBetween($min = 80000, $max = 100000),
            'daily_price' => fake()->numberBetween($min = 2000, $max = 5000),
            'service_charge_floor' => fake()->numberBetween($min = 50000, $max = 60000),
            'service_charge_own_electricity' => fake()->numberBetween($min = 40000, $max = 50000),
            'overtime_up_4' => fake()->numberBetween($min = 10000, $max = 15000),
            'overtime_down_4' => fake()->numberBetween($min = 10000, $max = 15000),
        ];
    }
}
