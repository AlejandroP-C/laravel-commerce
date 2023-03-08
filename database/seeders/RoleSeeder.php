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
       $role1= Role::create(['name' => 'SuperAdministracionPortal']);
       $role2= Role::create(['name' => 'AdministracionComercios']);


       Permission::create(['name' => 'admin.home'])->syncRoles([$role1,$role2]); 

       Permission::create(['name' => 'admin.categories.index'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.categories.create'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.categories.edit'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.categories.destroy'])->syncRoles([$role1]);
       

       Permission::create(['name' => 'admin.commerces.index'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.commerces.create'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.commerces.edit'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.commerces.destroy'])->syncRoles([$role1]);


       Permission::create(['name' => 'admin.products.index'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.products.create'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.products.edit'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.products.destroy'])->syncRoles([$role1,$role2]);
    }
}
