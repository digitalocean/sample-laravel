<?php

namespace Database\Factories;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit scholarships']);
        Permission::create(['name' => 'delete scholarships']);
        Permission::create(['name' => 'create scholarships']);


        // or may be done by chaining
        $role = Role::create(['name' => 'partner'])
            ->givePermissionTo(['edit scholarships', 'delete scholarships', 'create scholarships' ]);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}