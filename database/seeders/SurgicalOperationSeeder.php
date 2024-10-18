<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SurgicalOperation;
use App\Models\Patient;
use App\Models\Doctor;
use Faker\Factory as Faker;

class SurgicalOperationSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $patients = Patient::all();
        $doctors = Doctor::all();

        foreach (range(1, 10) as $index) {
            SurgicalOperation::create([
                'operation_date' => $faker->date,
                'patient_id' => $faker->randomElement($patients)->id,
                'doctor_id' => $faker->randomElement($doctors)->id,
            ]);
        }
    }
}

