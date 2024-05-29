<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $places = [
            ['name' => 'Ijen', 'address' => ''],
            ['name' => 'Sigura-gura', 'address' => ''],
            ['name' => 'Coklat', 'address' => ''],
        ];

        foreach ($places as $place) {
            Place::create([
                'name' => $place['name'],
                'address' => $place['address'],
            ]);
        }
    }
}
