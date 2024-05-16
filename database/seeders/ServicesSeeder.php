<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $services = [
            ['name' => 'Haircut', 'description' => 'Basic haircut service', 'price' => 50000],
            ['name' => 'Hair Coloring', 'description' => 'Hair coloring service', 'price' => 150000],
            ['name' => 'Shave', 'description' => 'Shaving service', 'price' => 30000],
            ['name' => 'Facial', 'description' => 'Facial treatment', 'price' => 100000],
            ['name' => 'Manicure', 'description' => 'Manicure service', 'price' => 75000],
            // Add more services as needed
        ];

        foreach ($services as $service) {
            DB::table('services')->insert([
                'name' => $service['name'],
                'description' => $service['description'],
                'price' => $service['price'],
            ]);
        }
    }
}