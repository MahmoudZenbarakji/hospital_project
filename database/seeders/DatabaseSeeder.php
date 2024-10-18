<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            DepartmentSeeder::class,
            RoomSeeder::class,
            DoctorSeeder::class,
            ServiceSeeder::class,
            PatientSeeder::class,
            SurgicalOperationSeeder::class,
        ]);
    }
}
