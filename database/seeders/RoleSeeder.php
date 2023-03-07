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
       $role1= Role::create(['name' => 'Super Administración Portal']);
       $role2= Role::create(['name' => 'Administración Comercios']);


       Permission::create(['name' => 'admin.home']);
    }
}
