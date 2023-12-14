<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /** php artisan db:seed --class=
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = ['add-product', 'edit-product', 'delete-product', 'add-category', 'edit-category', 'delete-category', 'add-admin'];
        foreach ($permissions as $permission) {
            DB::table('permissions')->insert(['name' => $permission]);
        }
    }
}
