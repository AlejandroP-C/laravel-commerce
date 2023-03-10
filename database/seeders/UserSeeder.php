<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Juan Cruz Ortiz',
            'dni' => '8542058y',
            'phone' => 641510110,
            'email' => 'juancruzortiz@gmail.com',
            'position' => 'Gerente',
            'password' => bcrypt('juanjuan')
        ])->assignRole('AdministracionComercios');

        User::create([
            'name' => 'Ian Garcia Ordoñez',
            'dni' => '20880621w',
            'phone' => 652418766,
            'email' => 'iangarcia@gmail.com',
            'position' => 'Gerente',
            'password' => bcrypt('ianian')
        ])->assignRole('SuperAdministracionPortal');
        
        User::factory(8)->create();
    }
}
