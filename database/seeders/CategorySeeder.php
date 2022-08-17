<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'slug' => 'Sports',
                'status' => 1,
                'created_at' => date('Y/m/d'),
            ],
            [
                'name' => 'Health',
                'slug' => 'Health',
                'status' => 1,
                'created_at' => date('Y/m/d'),
            ],
            [
                'name' => 'Technology',
                'slug' => 'Technology',
                'status' => 1,
                'created_at' => date('Y/m/d'),
            ],
            [
                'name' => 'Science',
                'slug' => 'Science',
                'status' => 1,
                'created_at' => date('Y/m/d'),
            ]
        ]);
    }
}
