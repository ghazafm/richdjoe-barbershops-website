<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Seed transaction table
        $customers = DB::table('customer')->pluck('id');
        $kapsters = DB::table('kapster')->pluck('id');
        $services = DB::table('services')->pluck('id');
        foreach ($customers as $customerId) {
            $serviceIds = $faker->randomElements($services->toArray(), $count = $faker->numberBetween(1, 3));
            foreach ($serviceIds as $serviceId) {
                DB::table('transaction')->insert([
                    'customer_id' => $customerId,
                    'service_id' => $serviceId,
                    'kapster_id' => $faker->randomElement($kapsters->toArray()),
                    'transaction_date' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
                    'total_price' => $faker->randomNumber(4),
                    'rating' => $faker->numberBetween(1, 5),
                    'comment' => $faker->sentence
                ]);

                // Seed transaction_services pivot table
                DB::table('transaction_services')->insert([
                    'transaction_id' => DB::getPdo()->lastInsertId(),
                    'service_id' => $serviceId
                ]);
            }
        }
    }
}
