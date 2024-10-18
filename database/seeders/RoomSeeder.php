<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Models\Room;
use App\Models\Department;
use Faker\Factory as Faker;

class RoomSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $departments = Department::all();

        foreach ($departments as $department) {
            foreach(range(1, $department->available_rooms) as $index) {
                Room::create([
                    'status' => $faker->randomElement(['occupied', 'vacant', 'under maintenance']),
                    'department_id' => $department->id,
                ]);
            }
        }
    }
}

