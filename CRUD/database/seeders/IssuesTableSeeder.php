<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Tạo tối đa 50 bản ghi
        foreach (range(1, 50) as $index) {
            DB::table('issues')->insert([
                'computer_id' => $faker->numberBetween(1, 50),
                'reported_by' => $faker->name,
                'reported_date' => $faker->dateTimeThisYear,
                'description' => $faker->sentence,
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
