<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->word(30);
        $price = $this->faker->randomFloat(1, 0, 99);
        return [
            'title' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(100),
            'price' => $price,
            'original_price' => $price,
            'votes_valoration' => $this->faker->numberBetween(40,100),
            'total_votes' => $this->faker->numberBetween(20,39)

        ];
    }
}


