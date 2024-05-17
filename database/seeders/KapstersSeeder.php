<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KapstersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID'); // Initialize the Faker library with Indonesian locale
        for ($i = 0; $i < 50; $i++) { // Create 20 dummy kapsters
            $name = $faker->name;
            $photoUrl = $faker->imageUrl(640, 480, 'people', true, 'Faker'); // Ensure a realistic URL
            $place = $faker->randomElement(['ijen', 'sigura-gura', 'soekarno hatta']);
            $schedule = $faker->sentence(5); // Example: Generate a random schedule string

            DB::table('kapsters')->insert([
                'name' => $name,
                'photo' => $photoUrl,
                'place' => $place,
                'schedule' => $schedule,
            ]);
        }
    }
}