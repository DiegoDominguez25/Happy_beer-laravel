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
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'User']);

        Permission::create(['name' => 'licor.index'])->assignRole($role1);
        Permission::create(['name' => 'licor.create'])->assignRole($role1);
        Permission::create(['name' => 'licor.store'])->assignRole($role1);
        Permission::create(['name' => 'licor.show'])->assignRole($role1);
        Permission::create(['name' => 'licor.edit'])->assignRole($role1);
        Permission::create(['name' => 'licor.destroy'])->assignRole($role1);
    }
}
