<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i <= 20; $i++) {
            DB::table('users')->insert([
                'username' => $faker->userName,
                'full_name' => $faker->name,
                'avatar' => 'z5065557836243_d8917957648f6fea7694fbb17f1c5c81.jpg',
                'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
                // Gender: 1: Male, 2: Female, 3: Other
                'gender_id' => $faker->numberBetween($min = 1, $max = 3),
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                // Role_id: 1: Admin, 2: User
                'role_id' => 2,
                // Status_id: 1: Active, 2: Inactive
                'status_id' => 1,
                'password' => bcrypt('password'),
            ]);
        }
    }
}
