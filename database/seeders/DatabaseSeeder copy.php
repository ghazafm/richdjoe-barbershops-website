<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Mengisi tabel kapster
        for ($i = 0; $i < 50; $i++) { // Create 50 kapsters
            DB::table('kapster')->insert([
                'name' => $faker->name,
                'photo' => $faker->imageUrl(640, 480, 'people', true, 'Faker'), // Ensure a realistic URL
                'schedule' => $faker->dayOfWeek . ' ' . $faker->time(),
            ]);
        }

        // Mengisi tabel customer
        for ($i = 0; $i < 400; $i++) {
            DB::table('customer')->insert([
                'name' => $faker->name,
                'other_data' => $faker->sentence,
            ]);
        }

        // Mengisi tabel services
        $services = ['Pangkas', 'Warnai', 'Creambath', 'Smoothing'];
        foreach ($services as $service) {
            DB::table('services')->insert([
                'name' => $service,
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 50000, 500000),
            ]);
        }

        // Mengisi tabel transaction
        $customers = DB::table('customer')->pluck('id');
        $serviceIds = DB::table('services')->pluck('id');

        for ($i = 0; $i < 2000; $i++) { // Generate 50 transactions
            $customerId = $faker->randomElement($customers);
            $serviceId = $faker->randomElement($serviceIds);
            DB::table('transaction')->insert([
                'customer_id' => $customerId,
                'service_id' => $serviceId,
                'transaction_date' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
                'total_price' => DB::table('services')->where('id', $serviceId)->value('price'),
                'other_data' => $faker->sentence,
            ]);
        }
    }
}
