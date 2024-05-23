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
            ['name' => 'Basic Haircut', 'description' => 'A simple and clean haircut.', 'type' => 'haircut', 'price' => 15000],
            ['name' => 'Deluxe Haircut', 'description' => 'A stylish haircut with shampoo and blow-dry.', 'type' => 'haircut', 'price' => 25000],
            ['name' => 'Kids Haircut', 'description' => 'Specialized haircut for children under 12.', 'type' => 'haircut', 'price' => 12000],
            ['name' => 'Premium Haircut', 'description' => 'Specialized haircut for premium service.', 'type' => 'haircut', 'price' => 120000],
            ['name' => 'Beard Trim', 'description' => 'Beard trimming and shaping.', 'type' => 'other', 'price' => 10000],
            ['name' => 'Full Shave', 'description' => 'Complete shave with hot towel treatment.', 'type' => 'other', 'price' => 20000],
            ['name' => 'Hair Coloring', 'description' => 'Professional hair coloring services.', 'type' => 'other', 'price' => 50000],
            ['name' => 'Hair Highlights', 'description' => 'Add highlights to your hair.', 'type' => 'other', 'price' => 40000],
            ['name' => 'Scalp Massage', 'description' => 'Relaxing scalp massage.', 'type' => 'other', 'price' => 15000],
            ['name' => 'Hair Treatment', 'description' => 'Specialized treatment for hair health.', 'type' => 'other', 'price' => 30000],
            ['name' => 'Shampoo and Blow-Dry', 'description' => 'Shampooing and blow-drying services.', 'type' => 'other', 'price' => 20000],
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
