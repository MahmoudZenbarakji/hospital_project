<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use Faker\Factory as Faker;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Service::create([
                'name' => $faker->randomElement(['MRI', 'CT Scan', 'Blood Test', 'X-ray', 'Ultrasound']),
                'type' => $faker->randomElement(['medical imaging', 'laboratory test']),
            ]);
        }
    }
}
