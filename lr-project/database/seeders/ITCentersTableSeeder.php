<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ITCentersTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('it_centers')->insert([
                'name' => $faker->company . ' Center',
                'location' => $faker->address,
                'contact_email' => $faker->unique()->companyEmail,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
