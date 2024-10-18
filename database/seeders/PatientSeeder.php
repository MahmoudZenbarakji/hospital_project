<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\Room;
use App\Models\Service;
use Faker\Factory as Faker;

class PatientSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $rooms = Room::all();
        $services = Service::all();

        foreach (range(1, 10) as $index) {
            Patient::create([
                'name' => $faker->name,
                'admission_date' => $faker->date,
                'discharge_date' => $faker->optional()->date,
                'room_id' => $faker->randomElement($rooms)->id,
                'service_id' => $faker->randomElement($services)->id,
            ]);
        }
    }
}

