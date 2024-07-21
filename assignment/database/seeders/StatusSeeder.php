<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User Status
        DB::table('user_status')->insert([
            ['name' => 'Active'],
            ['name' => 'Inactive'], 
        ]);
        // Category Status
        DB::table('category_status')->insert([
            ['name' => 'Active'],
            ['name' => 'Inactive'], 
        ]);
        // Post Status
        DB::table('post_status')->insert([
            ['name' => 'Draft'],
            ['name' => 'Published'],
            ['name' => 'Archived'], 
        ]);
        // Ads Status
        DB::table('ads_status')->insert([
            ['name' => 'Active'],
            ['name' => 'Inactive'], 
        ]); 
    }
}
