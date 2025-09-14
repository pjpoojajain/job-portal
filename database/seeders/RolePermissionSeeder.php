<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create roles
        $admin = Role::create(['name' => 'admin']);
        $employer = Role::create(['name' => 'employer']);
        $jobseeker = Role::create(['name' => 'jobseeker']);

        // Create permissions
        Permission::create(['name' => 'create job']);
        Permission::create(['name' => 'edit job']);
        Permission::create(['name' => 'delete job']);
        Permission::create(['name' => 'apply job']);

        // Assign permissions to roles
        $employer->givePermissionTo(['create job', 'edit job', 'delete job']);
        $jobseeker->givePermissionTo('apply job');
        $admin->givePermissionTo(Permission::all());
    }
}
