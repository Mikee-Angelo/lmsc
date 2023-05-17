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

        Permission::create(['name' => 'create books']);
        Permission::create(['name' => 'view books']); 
        Permission::create(['name' => 'delete books']);
        Permission::create(['name' => 'update books']);
     
        // User
        Permission::create(['name' => 'create account']);
        Permission::create(['name' => 'disable account']);
        Permission::create(['name' => 'view account']);
        Permission::create(['name' => 'update account']);
        
        // Stakeholder
        Permission::create(['name' => 'import stakeholder']);
        Permission::create(['name' => 'view stakeholder']); 
        Permission::create(['name' => 'create faculty']);

        //Penalties
        Permission::create(['name' => 'create penalty']);
        Permission::create(['name' => 'view penalty']); 
        Permission::create(['name' => 'delete penalty']);

        //Role
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'view role']); 

        //Reports
        Permission::create(['name' => 'import reports']);
        Permission::create(['name' => 'view reports']); 

        //Profile
        Permission::create(['name' => 'edit profile']); 

        Role::create(['name' => 'Assistant Librarian']);
    }
}
