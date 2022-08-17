<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
        [
            'name' => 'Admin',
            'status' => 1,
            'created_at' => date('Y/m/d')
        ],
        [
            'name' => 'Account manager',
            'status' => 1,
            'created_at' => date('Y/m/d')
        ],
        [
            'name' => 'Content manager',
            'status' => 1,
            'created_at' => date('Y/m/d')
        ],
        [
            'name' => 'Writer',
            'status' => 1,
            'created_at' => date('Y/m/d')
        ]
    ]);
    }
}
