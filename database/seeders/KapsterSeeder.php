<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kapster;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;

class KapsterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     $faker = Faker::create();

    //     $places = ['Soekarno Hatta', 'Ijen', 'Sigura-gura'];

    //     for ($i = 0; $i < 30; $i++) {
    //         Kapster::create([
    //             'name' => $faker->name,
    //             'photo' => $faker->imageUrl(640, 480, 'people', true, 'Faker'),
    //             'place' => Arr::random($places), // Use Arr::random() to get a random item from the array
    //             'schedule' => $faker->text(100),
    //         ]);
    //     }
    // }
    public function run(): void
    {
        $kapsters = [
            ['name' => 'Poneri', 'place_id' => '3', 'schedule' => '09.00-15.00'],
            ['name' => 'Anang', 'place_id' => '3', 'schedule' => '09.00-15.00'],
            ['name' => 'Brian', 'place_id' => '3', 'schedule' => '09.00-15.00'],
            ['name' => 'Jodi', 'place_id' => '3', 'schedule' => '15.00-21.00'],
            ['name' => 'Dhea', 'place_id' => '3', 'schedule' => '15.00-21.00'],
            ['name' => 'Bahrul', 'place_id' => '3', 'schedule' => '15.00-21.00'],
            ['name' => 'Erick', 'place_id' => '2', 'schedule' => '09.00-21.00'],
            ['name' => 'Tom', 'place_id' => '2', 'schedule' => '09.00-21.00'],
            ['name' => 'Bimo', 'place_id' => '2', 'schedule' => '09.00-21.00'],
            ['name' => 'Khoir', 'place_id' => '1', 'schedule' => '09.00-15.00'],
            ['name' => 'Marcel', 'place_id' => '1', 'schedule' => '09.00-15.00'],
            ['name' => 'Alfa', 'place_id' => '1', 'schedule' => '15,00-21.00'],
            ['name' => 'Bimo', 'place_id' => '1', 'schedule' => '15,00-21.00'],
        ];

        foreach ($kapsters as $kapster) {
            Kapster::create([
                'name' => $kapster['name'],
                'place_id' => $kapster['place_id'],
                'schedule' => $kapster['schedule'],
            ]);
        }
    }
}
