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
            ['name' => 'Basic Haircut', 'place' => 'A simple and clean haircut.', 'schedule' => 'ha'],
            ['name' => 'Deluxe Haircut', 'place' => 'A stylish haircut with shampoo and blow-dry.', 'schedule' => ''],
            ['name' => 'Kids Haircut', 'place' => 'Specialized haircut for children under 12.', 'schedule' => ''],
            ['name' => 'Premium Haircut', 'place' => 'Specialized haircut for premium service.', 'schedule' => ''],
            ['name' => 'Beard Trim', 'place' => 'Beard trimming and shaping.', 'schedule' => ''],
            ['name' => 'Full Shave', 'place' => 'Complete shave with hot towel treatment.', 'schedule' => ''],
            ['name' => 'Hair Coloring', 'place' => 'Professional hair coloring services.', 'schedule' => ''],
            ['name' => 'Hair Highlights', 'place' => 'Add highlights to your hair.', 'schedule' => ''],
            ['name' => 'Scalp Massage', 'place' => 'Relaxing scalp massage.', 'schedule' => ''],
            ['name' => 'Hair Treatment', 'place' => 'Specialized treatment for hair health.', 'schedule' => ''],
            ['name' => 'Shampoo and Blow-Dry', 'place' => 'Shampooing and blow-drying services.', 'schedule' => ''],
        ];

        foreach ($kapsters as $kapster) {
            Kapster::create([
                'name' => $kapster['name'],
                'place' => $kapster['place'],
                'schedule' => $kapster['schedule'],
            ]);
        }
    }
}
