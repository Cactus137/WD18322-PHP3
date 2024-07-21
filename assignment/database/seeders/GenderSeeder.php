<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Gender 
        DB::table('user_gender')->insert([
            ['name' => 'Male'],
            ['name' => 'Female'],
            ['name' => 'Other'],
        ]);
    }
}
