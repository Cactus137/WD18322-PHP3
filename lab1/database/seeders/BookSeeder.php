<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 100; $i++) {
            Book::create([
                'title' => $faker->sentence(6),
                'thumbnail' => $faker->imageUrl(),
                'author' => $faker->name(),
                'publisher' => $faker->company(),
                'publication' => $faker->dateTime(),
                'price' => $faker->randomFloat(2, 100, 1000),
                'quantity' => $faker->numberBetween(1, 100),
                'category_id' => $faker
                    ->randomElement(Category::pluck('id')->toArray()),
            ]);
        }
    }
}
