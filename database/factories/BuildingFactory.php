<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Building>
 */
class BuildingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => fake()->unique()->numerify('G####'),
            'name' => fake()->unique()->regexify('Gedung [A-Z]'),
            'address' => fake()->address(),
            'image' => fake()->image('public/storage/images/buildings/', 640, 360, 'buildings', false, true),
        ];
    }
}
