<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::insert([
        [
            'name' => 'sports',
            'slug' => 'sports-tag',
            'status' => true,
            'created_at' => date('Y-m-d')
        ],
        [
            'name' => 'people',
            'slug' => 'people-tag',
            'status' => true,
            'created_at' => date('Y-m-d')
        ],
        [
            'name' => 'healthy',
            'slug' => 'healthy-tag',
            'status' => true,
            'created_at' => date('Y-m-d')
        ],
        [
            'name' => 'technology',
            'slug' => 'technology-tag',
            'status' => true,
            'created_at' => date('Y-m-d')
        ],
        [
            'name' => 'science',
            'slug' => 'science-tag',
            'status' => true,
            'created_at' => date('Y-m-d')
        ]
    ]);
    }
}
