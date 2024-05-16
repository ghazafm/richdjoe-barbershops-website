<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $customerIds = DB::table('users')->where('role', 'customer')->pluck('id');
        $kapsterIds = DB::table('kapsters')->pluck('id');
        $serviceIds = DB::table('services')->pluck('id');

        for ($i = 0; $i < 1000; $i++) {
            $customerId = $faker->randomElement($customerIds);
            $kapsterId = $faker->randomElement($kapsterIds);
            $serviceId = $faker->randomElement($serviceIds);
            $rating = $faker->numberBetween(1, 5);
            $comment = $faker->sentence;

            $service = DB::table('services')->where('id', $serviceId)->first();
            $totalPrice = $service->price;

            DB::table('transactions')->insert([
                'customer_id' => $customerId,
                'kapster_id' => $kapsterId,
                'service_id' => $serviceId,
                'total_price' => $totalPrice,
                'rating' => $rating,
                'comment' => $comment,
            ]);
        }
    }
}