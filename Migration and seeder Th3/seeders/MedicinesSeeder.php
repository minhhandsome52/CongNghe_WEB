<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class MedicinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
             DB::table("medicines")->insert([
                 'name' => $faker->word,
                 'brand' => $faker->company,
                 'dosage' =>$faker->randomElement(['500mg', '1000mg', '250mg']),
                 'form' => $faker->randomElement(['viên nén', 'viên nang', 'dung dịch']),
                 'price' => $faker->randomFloat(2, 1000, 100000),
                 'stock' => $faker->numberBetween(10, 100),
             ]);
 
        }
    }
}