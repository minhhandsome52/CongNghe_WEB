<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RentersTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('renters')->insert([
                'name' => $faker->name,
                'phone_number' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}