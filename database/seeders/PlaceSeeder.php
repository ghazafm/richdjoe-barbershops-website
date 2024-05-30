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
            ['name' => 'Ijen', 'address' => 'Jl. Besar Ijen No.86, Oro-oro Dowo, Kec. Klojen, Kota Malang, Jawa Timur 65119'],
            ['name' => 'Sigura-gura', 'address' => 'Jl. Sigura - Gura No.2 Kavling 4, Sumbersari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145'],
            ['name' => 'Soekarno Hatta', 'address' => 'Jl. Bunga Coklat No.1, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141'],
        ];

        foreach ($places as $place) {
            Place::create([
                'name' => $place['name'],
                'address' => $place['address'],
            ]);
        }
    }
}
