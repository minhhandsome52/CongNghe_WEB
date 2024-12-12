<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $classIds = DB::table('classes')->pluck('id');
        for ($i = 0; $i < 50; $i++) { // Tạo 50 học sinh
            DB::table('students')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date('Y-m-d', '2018-12-31'), 
                'parent_phone' => $faker->unique()->phoneNumber(),
                'class_id' => $faker->randomElement($classIds),
            ]);
        }
    }
}