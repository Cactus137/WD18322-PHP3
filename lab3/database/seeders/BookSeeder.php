<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 50; $i++) {
            DB::table('books')->insert([
                'title' => $faker->name,
                'thumbnail' => $faker->imageUrl(),
                'author' => $faker->name,
                'publisher' => $faker->name,
                'publication' => now(),
                'price' => $faker->randomFloat(2, 100, 1000),
                'quantity' => $faker->numberBetween(1, 100),
                'category_id' => $faker
                    ->randomElement(DB::table('categories')->pluck('id')->toArray()),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
