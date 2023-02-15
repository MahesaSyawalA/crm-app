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
            'code_building' => fake()->unique()->numerify('G####'),
            'name_building' => fake()->unique()->regexify('Gedung [A-Z]'),
            'address_building' => fake()->address(),
            'image_building' => fake()->image('public/storage/images/', 640, 360, 'buildings', false, true),
        ];
    }
}
