<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Nguyen Lu',
            'email' => 'nguyenlu@gmailcom',
            'password' => Hash::make('12345678'),
            // 'role_id' => 1,
            'status' => 1,
            'created_at' => date('Y/m/d')
        ]);
    }
}
