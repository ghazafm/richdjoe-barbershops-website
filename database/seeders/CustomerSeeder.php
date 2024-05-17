<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    public function run(): void 
    {
        $faker = Faker::create('id_ID');

        // Seed customer table
        for ($i = 0; $i < 20; $i++) {
            DB::table('customer')->insert([
                'name' => $faker->name,
                'registration_date' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
            ]);
        }
    }
}
