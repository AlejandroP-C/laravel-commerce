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


       Permission::create(['name' => 'admin.home','description' => 'Ver el dashboard'])->syncRoles([$role1,$role2]); 

       Permission::create(['name' => 'admin.users.index','description' => 'Ver listado de usuarios'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.users.edit','description' => 'Editar usuarios'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.users.update','description' => 'Actualizar categoraías'])->syncRoles([$role1]);

       Permission::create(['name' => 'admin.roles.index','description' => 'Ver listado de roles'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.roles.create','description' => 'Crear roles'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.roles.edit','description' => 'Editar roles'])->syncRoles([$role1]);

       Permission::create(['name' => 'admin.categories.index','description' => 'Ver listado de categorías'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.categories.create','description' => 'Crear categorías'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.categories.edit','description' => 'Editar categoraías'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.categories.destroy','description' => 'Eliminar categorías'])->syncRoles([$role1]);
       

       Permission::create(['name' => 'admin.commerces.index','description' => 'Ver listado de comercios'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.commerces.create','description' => 'Crear comercios'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.commerces.edit','description' => 'Editar comercios'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.commerces.destroy','description' => 'Eliminar comercios'])->syncRoles([$role1]);

       Permission::create(['name' => 'admin.products.index','description' => 'Ver listado de productos'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.products.create','description' => 'Crear Productos'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.products.edit','description' => 'Editar Productos'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.products.destroy','description' => 'Eliminar productos'])->syncRoles([$role1,$role2]);
    }
}
