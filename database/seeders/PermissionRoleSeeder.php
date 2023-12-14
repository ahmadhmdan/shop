<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permission IDs for 'admin' role
        $adminPermissions = [1, 2, 3, 4, 5, 6];

        // Permission IDs for 'super-admin' role (all permissions)
        $superAdminPermissions = [1, 2, 3, 4, 5, 6, 7];

        // Assign permissions to 'admin' role
        foreach ($adminPermissions as $permissionId) {
            DB::table('permission_role')->insert([
                'role_id' => 2, // 'admin' role ID
                'permission_id' => $permissionId,
            ]);
        }

        // Assign permissions to 'super-admin' role
        foreach ($superAdminPermissions as $permissionId) {
            DB::table('permission_role')->insert([
                'role_id' => 1, // 'super-admin' role ID
                'permission_id' => $permissionId,
            ]);
        }
    }
}
