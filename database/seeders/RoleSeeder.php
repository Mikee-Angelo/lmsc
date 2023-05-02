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
     *
     * @return void
     */
    public function run()
    {
        
        $role = Role::create(['name' => 'Admin']); 

        $p0 = Permission::create(['name' => 'create books']);
        $p1 = Permission::create(['name' => 'edit books']); 
        $p2 = Permission::create(['name' => 'delete books']);
        $p3 = Permission::create(['name' => 'update books']);
        Permission::create(['name' => 'create account']);
        Permission::create(['name' => 'disable account']);
        Permission::create(['name' => 'delete account']);
        Permission::create(['name' => 'update account']);
        
        $role->givePermissionTo(Permission::all());

        $assistantRole = Role::create(['name' => 'Assistant Librarian']);
        
        $assistantRole->givePermissionTo(Permission:all());
    }
}
