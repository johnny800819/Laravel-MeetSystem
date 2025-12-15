<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminUser;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LegacyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Create Permissions (Based on legacy system)
        $permissions = [
            'manage_contents',
            'manage_users',
            'manage_system',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'admin']);
        }

        // 2. Create Roles
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'admin']);
        $managerRole = Role::firstOrCreate(['name' => 'Manager', 'guard_name' => 'admin']);

        // Assign permissions to roles
        $superAdminRole->givePermissionTo(Permission::all());

        // 3. Create Admin User (Legacy Admin)
        $admin = AdminUser::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('123456'), // Legacy default password
                'is_super' => true,
            ]
        );

        // Assign Super Admin role to the admin user
        $admin->assignRole($superAdminRole);

        $this->command->info('Legacy RBAC data seeded successfully!');
    }
}
