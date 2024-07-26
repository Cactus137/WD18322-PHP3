<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataGenres = [
            'Action',
            'Adventure',
            'Animation',
            'Biography',
            'Comedy',
            'Crime',
            'Documentary',
            'Drama',
            'Family',
            'Fantasy',
            'History',
            'Horror',
            'Music',
        ];

        for ($i = 0; $i < count($dataGenres); $i++) {
            Genre::create([
                'name' => $dataGenres[$i],
            ]);
        }
    }
}
