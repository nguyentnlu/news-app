<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

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
            'status' => true,
            'created_at' => date('Y/m/d')
        ],
        [
            'name' => 'Account manager',
            'status' => true,
            'created_at' => date('Y/m/d')
        ],
        [
            'name' => 'Content manager',
            'status' => true,
            'created_at' => date('Y/m/d')
        ],
        [
            'name' => 'Writer',
            'status' => true,
            'created_at' => date('Y/m/d')
        ]
    ]);
    }
}
