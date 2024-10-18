<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use Faker\Factory as Faker;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 10) as $index) {
            Department::create([
                'name' => $faker->randomElement(['Emergency', 'Surgery', 'Internal Medicine', 'Pediatrics', 'Orthopedics']),
                'available_rooms' => $faker->numberBetween(1, 20),
            ]);
        }
    }
}