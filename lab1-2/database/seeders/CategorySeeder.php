<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $nameCategory = [
            'Science Fiction',
            'Mystery/Thriller',
            'Fantasy',
            'Biography/Autobiography',
            'Historical Fiction',
            'Romance',
            'Horror',
            'Self-Help',
            'Young Adult',
            'Graphic Novels',
            'Classics',
            'Adventure',
            'Non-Fiction',
            'Poetry',
            'Philosophy',
            'Psychology',
            'Cooking',
            'Travel',
            'True Crime',
        ];

        for ($i = 1; $i <= 5; $i++) {
            Category::create([
                // Random name category
                'name' => $nameCategory[$faker->numberBetween(0, 18)],
            ]);
        }
    }
}
