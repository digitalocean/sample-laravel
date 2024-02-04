<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $adminRole = Role::create(['name' => 'admin','guard_name' => 'web']);
        $teamRole = Role::create(['name' => 'teamMember','guard_name' => 'web']);
        $partnerRole = Role::create(['name' => 'partner','guard_name' => 'web']);

        $adminRole->givePermissionTo(
            'view users','create users','edit users', 'delete users',
            'view scholarships','create scholarships','edit scholarships','delete scholarships',
            'view applications', 'create applications', 'edit applications', 'delete applications',
            'view partner', 'create partner', 'delete partner'
        );
        $teamRole->givePermissionTo(
            'view users','create users','edit users',
            'view scholarships','create scholarships','edit scholarships',
            'view applications', 'delete applications',
            'view partner', 'create partner'
        );
        $partnerRole->givePermissionTo(
            'view users','create users','edit users',
            'view scholarships','create scholarships','edit scholarships','delete scholarships',
            'view applications'
        );
    }

    
}
