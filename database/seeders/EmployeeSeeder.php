<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            Employee::create([
                'name'          => $faker->name,
                'email'         => $faker->unique()->safeEmail,
                'phone'         => $faker->phoneNumber,
                'department_id' => rand(1, 2), // حسب الأقسام التي أنشأناها
                'position'      => $faker->jobTitle,
                'salary'        => $faker->numberBetween(3000, 15000),
            ]);
        }
    }
}
