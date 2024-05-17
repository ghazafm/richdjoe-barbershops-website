<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            KapsterSeeder::class,
            CustomerSeeder::class,
            ServicesSeeder::class,
            TransactionSeeder::class,
        ]);
    }
}
