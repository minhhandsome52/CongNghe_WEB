<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LaptopsTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Giả sử có 10 người thuê (renters) đã được tạo
        for ($i = 0; $i < 20; $i++) {
            DB::table('laptops')->insert([
                'brand' => $faker->randomElement(['Dell', 'HP', 'Asus', 'Lenovo', 'Apple']),
                'model' => $faker->word . ' ' . $faker->randomNumber(4),
                'specifications' => $faker->randomElement(['i5, 8GB RAM, 256GB SSD', 'i7, 16GB RAM, 512GB SSD', 'i3, 4GB RAM, 128GB SSD']),
                'rental_status' => $faker->boolean,
                'renter_id' => $faker->optional()->numberBetween(1, 10), // Có thể null hoặc từ 1 đến 10
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
