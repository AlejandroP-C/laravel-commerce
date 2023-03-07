<?php

namespace Database\Seeders;

use App\Models\Commerce;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommerceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $commerces = Commerce::factory(10)->create();
        
        foreach ($commerces as $commerce) {
            $commerce->categories()->attach([
                rand(1,2),
                rand(3,4)
            ]);
        }
    }
}
