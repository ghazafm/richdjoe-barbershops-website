<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Seed services table
        $services = ['Haircut', 'Shave', 'Beard Trim', 'Hair Coloring', 'Facial', 'Massage'];
        foreach ($services as $service) {
            DB::table('services')->insert([
                'name' => $service,
                'description' => $faker->sentence,
                'price' => $faker->randomNumber(5)
            ]);
        }
    }
}
