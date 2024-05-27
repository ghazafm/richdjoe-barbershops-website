<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Kapster;
use App\Models\Service;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get all user, kapster, and service IDs
        $users = User::all();
        $kapsters = Kapster::all();
        $services = Service::all();

        for ($i = 0; $i < 1000; $i++) {
            // Randomly select a service
            $service = $services->random();

            // Generate a realistic schedule within the next 7 days
            $schedule = $faker->dateTimeBetween('+1 day', '+7 days')->format('Y-m-d H:i:s');

            // Assuming working hours are from 9 AM to 6 PM
            $schedule = date('Y-m-d', strtotime($schedule)) . ' ' . $faker->numberBetween(9, 18) . ':00:00';

            Transaction::create([
                'user_id' => $users->random()->id,
                'kapster_id' => $kapsters->random()->id,
                'service_id' => $service->id,
                'schedule' => $schedule,
                'total_price' => $service->price,
                'service_status' => $faker->randomElement(['wait', 'decline', 'verified','cancelled']),
                'payment_status' => $faker->randomElement(['process', 'verified']),
                'rating' => $faker->optional()->numberBetween(1, 5),
                'comment' => $faker->optional()->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
