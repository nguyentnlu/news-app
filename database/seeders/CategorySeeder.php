<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'name' => 'Sports',
                'slug' => 'sports-category',
                'status' => 1,
                'created_at' => date('Y/m/d'),
            ],
            [
                'name' => 'Health',
                'slug' => 'health-category',
                'status' => 1,
                'created_at' => date('Y/m/d'),
            ],
            [
                'name' => 'Technology',
                'slug' => 'technology-category',
                'status' => 1,
                'created_at' => date('Y/m/d'),
            ],
            [
                'name' => 'Science',
                'slug' => 'science-category',
                'status' => 1,
                'created_at' => date('Y/m/d'),
            ]
        ]);
    }
}
