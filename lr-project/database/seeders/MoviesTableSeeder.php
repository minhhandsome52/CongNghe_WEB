<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MoviesTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Giả sử có 5 rạp đã được tạo
        for ($i = 0; $i < 20; $i++) {
            DB::table('movies')->insert([
                'title' => $faker->sentence(3),
                'director' => $faker->name,
                'release_date' => $faker->date(),
                'duration' => $faker->numberBetween(90, 180),
                'cinema_id' => $faker->numberBetween(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
