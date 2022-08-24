<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            [
                'name' => 'read article',
            ],
            [
                'name' => 'read category',
            ],
            [
                'name' => 'read tag',
            ],
            [
                'name' => 'read user',
            ],
            [
                'name' => 'read role',
            ],
            [
                'name' => 'create article',
            ],
            [
                'name' => 'create category',
            ],
            [
                'name' => 'create tag',
            ],
            [
                'name' => 'create user',
            ],
            [
                'name' => 'create role',
            ],
            [
                'name' => 'enable article',
            ],
            [
                'name' => 'edit article',
            ],
            [
                'name' => 'edit category',
            ],
            [
                'name' => 'edit tag',
            ],
            [
                'name' => 'edit user',
            ],
            [
                'name' => 'edit role',
            ],
            [
                'name' => 'delete article',
            ],
            [
                'name' => 'delete category',
            ],
            [
                'name' => 'delete tag',
            ],
            [
                'name' => 'delete user',
            ],
            [
                'name' => 'delete role',
            ],
        ]);
    }
}
