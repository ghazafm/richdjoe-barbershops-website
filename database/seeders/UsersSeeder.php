<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 200; $i++) {
            $name = $faker->name;
            $email = $faker->unique()->safeEmail;
            $password = Hash::make('password'); // Use a secure hashing algorithm for passwords
            $role = $faker->randomElement(['customer', 'admin']);
            $registration_date = $faker->dateTimeThisMonth();

            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'role' => $role,
                'registration_date' => $registration_date,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
