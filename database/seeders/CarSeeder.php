<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $carTypes = ['Sedan', 'SUV', 'Coupe', 'Electric'];
        $status = ['0', '1'];
        $brands = ['Honda', 'Toyota', 'Tesla', 'BMW', 'Ford', 'Audi', 'Mercedes-Benz', 'Jeep', 'Porsche', 'Land Rover'];
        $models = ['Civic', 'Corolla', 'Model 3', 'X5', 'Mustang', 'A4', 'G-Wagon', 'Wrangler', '911 Carrera', 'Range Rover'];

        for ($i = 0; $i < 20; $i++) {
            DB::table('cars')->insert([
                'name' => $faker->randomElement($brands) . ' ' . $faker->randomElement($models),
                'brand' => $faker->randomElement($brands),
                'model' => $faker->bothify('??### 2023'),
                'car_type' => $faker->randomElement($carTypes),
                'rent_price' => $faker->numberBetween(50, 300),
                'status' => $faker->randomElement($status),
                'photo' => $faker->imageUrl(640, 480, 'transport', true, 'car'),
            ]);
        }
    }
}
