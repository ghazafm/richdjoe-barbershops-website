<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            KapsterSeeder::class,
            ServiceSeeder::class,
            TransactionSeeder::class,
            // Add more seeders if needed
        ]);
    }
}
