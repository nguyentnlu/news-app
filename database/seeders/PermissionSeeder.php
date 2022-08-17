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
                'name' => 'read category',
            ],
            [
                'name' => 'edit category',
            ],
            [
                'name' => 'create category',
            ],
            [
                'name' => 'delete category',
            ],
            [
                'name' => 'read article',
            ],
            [
                'name' => 'edit article',
            ],
            [
                'name' => 'enable article',
            ],
            [
                'name' => 'create article',
            ],
            [
                'name' => 'delete article',
            ],
            [
                'name' => 'read tag',
            ],
            [
                'name' => 'edit tag',
            ],
            [
                'name' => 'create tag',
            ],
            [
                'name' => 'delete tag',
            ],
            [
                'name' => 'read user',
            ],
            [
                'name' => 'edit user',
            ],
            [
                'name' => 'delete user',
            ],
            [
                'name' => 'read role',
            ],
            [
                'name' => 'edit role',
            ],
        ]);
    }
}
