<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KapsterSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Seed kapster table
        for ($i = 0; $i < 10; $i++) {
            DB::table('kapster')->insert([
                'name' => $faker->name,
                'photo' => null, // You can customize this if you have a photo path generator
                'schedule' => $faker->sentence
            ]);
        }
    }
}
