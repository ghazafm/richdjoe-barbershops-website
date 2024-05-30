<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['name' => 'ROYALE LUXE CUT', 'description' => 'A simple and clean haircut.', 'type' => 'haircut', 'price' => 139000],
            ['name' => 'ROYALE LUXE CUT + BACK MASSAGE', 'description' => 'A stylish haircut with shampoo and blow-dry.', 'type' => 'haircut', 'price' => 169000],
            ['name' => 'ROYALE LUXE CUT + ADD MASSAGE TIME (HEAD/FACE)', 'description' => 'Specialized haircut for children under 12.', 'type' => 'haircut', 'price' => 154000],
            ['name' => 'ROYALE LUXE CUT + BACK MASSAGE + ADD MASSAGE TIME (HEAD/FACE)', 'description' => 'Add highlights to your hair.', 'type' => 'haircut', 'price' => 184000],
            ['name' => 'ROYALE HAIRCUT', 'description' => 'Specialized haircut for premium service.', 'type' => 'haircut', 'price' => 85000],
            ['name' => 'TREATMENT', 'description' => 'Beard trimming and shaping.', 'type' => 'other', 'price' => 165000],
            ['name' => 'BLEACHING', 'description' => 'Complete shave with hot towel treatment.', 'type' => 'other', 'price' => 85000],
            ['name' => 'TONING', 'description' => 'Professional hair coloring services.', 'type' => 'other', 'price' => 150000],
            ['name' => 'FASHION COLOR', 'description' => 'Relaxing scalp massage.', 'type' => 'other', 'price' => 15000],
        ];

        foreach ($services as $service) {
            Service::create([
                'name' => $service['name'],
                'description' => $service['description'],
                'type' => $service['type'],
                'price' => $service['price'],
            ]);
        }
    }
}
