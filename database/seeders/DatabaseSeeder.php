<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Commerce;
use App\Models\Products;
use App\Models\Tickets;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('public/images');
        Storage::makeDirectory('public/images');

        $this->call(RoleSeeder::class);


        $this->call(UserSeeder::class);
        Category::factory(4)->create();
        Commerce::factory(10)->create()->unique();
        Tickets::factory(10)->create();
        Products::factory(25)->create()->unique();
        $this->call(CommerceSeeder::class) ;
        $this->call(ProductSeeder::class);
        
    }
}
