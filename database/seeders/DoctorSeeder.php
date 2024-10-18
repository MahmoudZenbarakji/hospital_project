<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use Faker\Factory as Faker;

class DoctorSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Doctor::create([
                'name' => $faker->name,
                'specialty' => $faker->randomElement(['Cardiology', 'Neurology', 'Oncology', 'Pediatrics', 'Surgery']),
                'shift_schedule' => $faker->randomElement(['MWF 9-5', 'TTh 10-6', 'Sat 8-4', 'Sun 9-5']),
            ]);
        }
    }
}

