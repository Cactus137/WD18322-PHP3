<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $images = File::files(public_path('assets/img/dummy'));

        // Post table
        for ($i = 0; $i <= 500; $i++) {
            $randomImage = $images[array_rand($images)];
            DB::table('posts')->insert([
                'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'slug' => Str::slug($faker->sentence($nbWords = 6, $variableNbWords = true)),
                'thumbnail' => 'assets/img/dummy/' . $randomImage->getFilename(),
                'content' => $faker->text($maxNbChars = 20000),
                'author' => $faker->name,
                'view_count' => $faker->numberBetween($min = 1, $max = 1000),
                'category_id' => $faker->numberBetween($min = 1, $max = 14),
                // 1: Active, 2: Inactive
                // 'status_id' => $faker->numberBetween($min = 1, $max = 2),
                'status_id' => 1,
                'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
            ]);
        }

        // Post Image table
        for ($i = 0; $i < 100; $i++) {
            $randomImage = $images[array_rand($images)];
            DB::table('post_images')->insert([
                'post_id' => $faker->numberBetween($min = 1, $max = 100),
                'image' => 'assets/img/dummy/' . $randomImage->getFilename(),
            ]);
        }

        // Bookmark table
        for ($i = 0; $i < 100; $i++) {
            DB::table('bookmarks')->insert([
                'user_id' => $faker->numberBetween($min = 1, $max = 20),
                'post_id' => $faker->numberBetween($min = 1, $max = 100),
            ]);
        }

        // User post visit table
        for ($i = 0; $i < 700; $i++) {
            DB::table('user_post_visits')->insert([
                'user_id' => $faker->numberBetween($min = 1, $max = 20),
                'post_id' => $faker->numberBetween($min = 1, $max = 100),
            ]);
        }

        // Comment table
        for ($i = 0; $i < 100; $i++) {
            DB::table('comments')->insert([
                'user_id' => $faker->numberBetween($min = 1, $max = 20),
                'post_id' => $faker->numberBetween($min = 1, $max = 100),
                'content' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            ]);
        }
    }
}