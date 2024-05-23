<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'usertype' => $faker->randomElement(['user', 'admin']),
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'password' => Hash::make('password'), // Default password for all users
            ]);
        }
    }
}
