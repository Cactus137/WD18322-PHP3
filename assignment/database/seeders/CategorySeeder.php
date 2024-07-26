<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $categories = [
            'Thời sự',
            'Góc nhìn',
            'Thế giới',
            'Kinh doanh',
            'Bất động sản',
            'Khoa học',
            'Giải trí',
            'Thể thao',
            'Pháp luật',
            'Giáo dục',
            'Sức khỏe',
            'Đời sống',
            'Du lịch',
            'Công nghệ',
        ];

        // $table->string('name')->unique();
        // $table->string('slug')->unique();
        // $table->bigInteger('status_id')->unsigned();

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'slug' => Str::slug($category),
                // 1: Active, 2: Inactive
                'status_id' => 1,
                // 'status_id' => $faker->numberBetween($min = 1, $max = 2),
            ]);
        }
    }
}
