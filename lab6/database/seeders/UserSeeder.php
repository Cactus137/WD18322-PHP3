<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $fullname = $faker->name;
            $username = $faker->userName;
            $email = $faker->email;
            $password = bcrypt('password');
            $avatar = 'default.jpg';
            $role = $faker->randomElement(['admin', 'user']);
            $active = $faker->boolean;
            User::create([
                'fullname' => $fullname,
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'avatar' => $avatar,
                'role' => $role,
                'active' => $active,
            ]);
        }
    }
}
