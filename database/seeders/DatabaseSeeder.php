<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            KapstersSeeder::class,
            UsersSeeder::class,
            ServicesSeeder::class,
            TransactionsSeeder::class,
        ]);
    }
}
