<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Products::factory(100)->create();
        
        foreach ($products as $product) {

            for ($i = 1; $i <= rand(1, 4); $i++) {
                Image::factory(1)->create([
                    'imageable_id' => $product->id,
                    'imageable_type' => Products::class
                ]);
            }

            $product->categories()->attach([
                rand(1,2),
                rand(3,4)
            ]);

            $product->commerces()->attach([
                rand(1,4),
                rand(5,10)
            ]);
        }
    }
}
