<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AdsPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        // 1: Top, 2: Sidebar, 3: Bottom 

        DB::table('ads_status')->insert([
            ['name' => 'Top'],
            ['name' => 'Sidebar'],
            ['name' => 'Bottom'],
        ]);
    }
}
