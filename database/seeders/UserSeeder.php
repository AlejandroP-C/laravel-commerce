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
            'dni' => 'y8542058',
            'name' => 'Juan Cruz Ortiz',
            'phone' => 641510110,
            'email' => 'juancruzortiz@gmail.com',
            'position' => 'Gerente',
            'password' => bcrypt('juanjuan')
        ]);
        User::factory(9)->create();
    }
}
