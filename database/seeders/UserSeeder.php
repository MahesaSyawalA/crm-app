<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin1
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);
        $user->assignRole('admin');
        $user->assignRole('marketing');
        $user->assignRole('technician');
        $user->assignRole('hod');
        $user->assignRole('finance');
        $user->assignRole('tenant');
        $user->assignRole('cater');

        //admin2
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'pmjtesting@pulomasjaya.co.id',
            'password' => bcrypt('Pulomas2410'),
        ]);
        $user->assignRole('admin');
    }
}
