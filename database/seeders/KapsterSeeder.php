<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kapster;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;

class KapsterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     $faker = Faker::create();

    //     $places = ['Soekarno Hatta', 'Ijen', 'Sigura-gura'];

    //     for ($i = 0; $i < 30; $i++) {
    //         Kapster::create([
    //             'name' => $faker->name,
    //             'photo' => $faker->imageUrl(640, 480, 'people', true, 'Faker'),
    //             'place' => Arr::random($places), // Use Arr::random() to get a random item from the array
    //             'schedule' => $faker->text(100),
    //         ]);
    //     }
    // }
    public function run()
    {
        // Inisialisasi Faker untuk menghasilkan data acak
        $faker = Faker::create('id_ID');

        // Definisikan array tempat
        $places = ['Soekarno Hatta', 'Ijen', 'Sigura-gura'];

        // Definisikan array path gambar lokal relatif terhadap direktori publik
        $imagePaths = [

            'image/services/service2.jpg',
            'image/services/service3.jpg',
            'image/services/service4.jpg',
            'image/services/service5.jpg'
            // Tambahkan lebih banyak path gambar jika diperlukan
        ];

        // Loop sebanyak 30 kali untuk membuat 30 record
        for ($i = 0; $i < 30; $i++) {
            // Buat record Kapster baru dengan field yang ditentukan
            $kapster = Kapster::create([
                'name' => $faker->name, // Menghasilkan nama acak
                'place' => Arr::random($places), // Memilih tempat acak dari array
                'schedule' => $faker->text(100), // Menghasilkan teks acak untuk jadwal
            ]);

            $id = $kapster->id;
            $kapster->update(['photo' => $id]);
        }
    }    
}
