<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HardwareDevicesTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Giả sử có 5 trung tâm đã được tạo
        for ($i = 0; $i < 20; $i++) {
            DB::table('hardware_devices')->insert([
                'device_name' => $faker->randomElement(['Logitech G502', 'Corsair K95', 'HyperX Cloud II', 'Razer DeathAdder', 'SteelSeries Rival 600']),
                'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset']),
                'status' => $faker->boolean,
                'center_id' => $faker->numberBetween(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
