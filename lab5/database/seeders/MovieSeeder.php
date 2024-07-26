<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $genres = Genre::all();

        for ($i = 0; $i <= 50; $i++) {
            Movie::create([
                'title' => $faker->sentence(3),
                'poster' => '1c63d274fa70ffaa88b4f9eba86f0e0e.jpg',
                'intro' => $faker->text(255),
                'release_date' => $faker->date(),
                'genre_id' => $genres->random()->id,
            ]);
        }
    }
}
