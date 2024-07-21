<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $images = File::files(public_path('assets/img/ads'));

        for ($i = 0; $i < 5; $i++) {
            $randomImage = $images[array_rand($images)];
            DB::table('ads')->insert([
                'image' => 'assets/img/ads/' . $randomImage->getFilename(),
                'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'link' => $faker->url,
                // 'status_id' => $faker->numberBetween($min = 1, $max = 2),
                'status_id' => 1,
                'clicks' => $faker->numberBetween($min = 0, $max = 100),
                'start_date' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
                'end_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 years', $timezone = null),
            ]);
        }
    }
}
