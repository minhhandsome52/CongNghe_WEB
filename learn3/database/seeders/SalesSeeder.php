<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $medicinesIds = DB::table('medicines')->pluck('id');
        for ($i = 0; $i < 100; $i++) {
            DB::table('sales')->insert([
                'medicine_id'=>$faker->randomElement($medicinesIds),
                'quantity'=>$faker->numberBetween(1, 100),
                'sale_date'=>$faker->date(),
                'customer_phone'=>$faker->unique()->phoneNumber(),
            ]);
        }
    }
}