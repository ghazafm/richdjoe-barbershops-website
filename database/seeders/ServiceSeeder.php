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
            ['name' => 'ROYALE LUXE CUT', 'description' => 'The Royale Luxe Cut is a premium haircut that combines elegance and precision to create a polished and luxurious look.', 'type' => 'haircut', 'price' => 139000],
            ['name' => 'ROYALE LUXE CUT + BACK MASSAGE', 'description' => 'Luxurious grooming with relaxing massage.', 'type' => 'haircut', 'price' => 169000],
            ['name' => 'ROYALE LUXE CUT + ADD MASSAGE TIME (HEAD/FACE)', 'description' => 'Luxurious haircut with extended massage.', 'type' => 'haircut', 'price' => 154000],
            ['name' => 'ROYALE LUXE CUT + BACK MASSAGE + ADD MASSAGE TIME (HEAD/FACE)', 'description' => 'Ultimate pampering with precision grooming.', 'type' => 'haircut', 'price' => 184000],
            ['name' => 'ROYALE HAIRCUT', 'description' => 'Royale Haircut is pinnacle of precision elegance.', 'type' => 'haircut', 'price' => 85000],
            ['name' => 'TREATMENT', 'description' => '"Treatment" encompasses a diverse array of services or procedures dedicated to enhancing health, appearance, or overall well-being.', 'type' => 'other', 'price' => 165000],
            ['name' => 'BLEACHING', 'description' => 'Bleaching is a chemical process that lightens or removes color from hair, textiles, or other materials.', 'type' => 'other', 'price' => 85000],
            ['name' => 'TONING', 'description' => 'Is a hair coloring technique used to neutralize unwanted tones, such as brassiness or yellowing, and achieve a desired shade or hue.', 'type' => 'other', 'price' => 150000],
            ['name' => 'FASHION COLOR', 'description' => 'Fashion color entails using vibrant dyes like pastels or neons to make bold style statements with hair.', 'type' => 'other', 'price' => 235000],
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
