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
        ])->assignRole('SuperAdmin');

        User::create([
            'name' => 'Ian Garcia',
            'dni' => '8542052s',
            'phone' => 641510111,
            'email' => 'iangarcia@gmail.com',
            'position' => 'Empleado',
            'password' => bcrypt('juanjuan')
        ])->assignRole('AdminComercios');
        
        User::factory(18)->create();
    }
}
