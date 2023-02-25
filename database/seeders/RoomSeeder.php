<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::factory()->count(1000)->create();
        // $data = [];

        // for ($i = 0; $i <= 1170; $i++) {
        //     $data[] =  [
        //         'code_room' => fake()->unique()->numerify('R####'),
        //         'name_room' => fake()->regexify('Ruang [A-Z]'),
        //         'status_room' => collect(['active', 'inactive', 'rented', 'booked', 'sealed'])->random(1)[0],
        //         'wide_room' => fake()->numerify('###'),
        //         'overtime_up_4_total' => fake()->numberBetween($min = 100000, $max = 150000),
        //         'overtime_down_4_total' => fake()->numberBetween($min = 100000, $max = 150000),
        //         'service_charge_total' => fake()->numberBetween($min = 500000, $max = 600000),
        //         'own_electricity_total' => fake()->numberBetween($min = 400000, $max = 500000),
        //         'image_room' => fake()->image('public/storage/images/rooms/', 640, 360, 'rooms', false, true),
        //         'desc_room' => fake()->paragraph(2),
        //         'id_building' => fake()->numberBetween(1, 20),
        //         'id_floor' => fake()->numberBetween(1, 200),
        //     ];
        // }

        // $chunks = array_chunk($data, 234);
        // foreach ($chunks as $chunk) {
        //     Room::insert($chunk);
        // }
        // $rooms = Room::factory()->count(1170)->make();
        // $chunks = $rooms->chunk(234);
        // $chunks->each(function ($chunk){
        //     Room::insert($chunk->toArray());
        // });
    }
}
