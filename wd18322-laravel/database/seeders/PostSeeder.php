<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();


        for ($i = 0; $i < 100; $i++) {
            DB::table('posts')->insert([
                'title' => $faker->sentence(6),
                'description' => $faker->sentence(6),
                'imageUrl' => $faker->imageUrl(),
                'content' => $faker->paragraph(6),
                'views' => $faker->numberBetween(0, 100),
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
