<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => fake()->unique()->numerify('R####'),
            'name' => fake()->regexify('Ruang [A-Z]'),
            'status' => collect(['active', 'inactive', 'rented', 'booked', 'sealed'])->random(1)[0],
            'wide' => fake()->numerify('###'),
            'overtime_up_4_total' => fake()->numberBetween($min = 100000, $max = 150000),
            'overtime_down_4_total' => fake()->numberBetween($min = 100000, $max = 150000),
            'service_charge_total' => fake()->numberBetween($min = 500000, $max = 600000),
            'own_electricity_total' => fake()->numberBetween($min = 400000, $max = 500000),
            // 'image_room' => fake()->image('public/storage/images/rooms/', 640, 360, 'rooms', false, true),
            'description' => fake()->paragraph(2),
            'floor_id' => fake()->numberBetween(1, 100),
        ];
    }
}
