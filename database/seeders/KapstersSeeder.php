<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class KapstersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Initialize the Faker library with Indonesian locale

        for ($i = 0; $i < 50; $i++) { // Change according to your project
            $name = $faker->name;
            $photo = $faker->imageUrl(640, 480, 'people', true, 'Faker'); // Ensure a realistic URL
            $schedule = $faker->sentence(5); // Example: Generate a random schedule string

            DB::table('kapsters')->insert([
                'name' => $name,
                'photo' => $photo,
                'schedule' => $schedule,
            ]);
        }
    }
}
