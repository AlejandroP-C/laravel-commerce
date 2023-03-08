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
        ])->assignRole('SuperAdministracionPortal');
        
        User::factory(9)->create();
    }
}
