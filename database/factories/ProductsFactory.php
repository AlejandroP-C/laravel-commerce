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
        return [
            'title' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(100),
            'price' => $this->faker->randomFloat(1, 0, 99),
            'votes_valoration' => $this->faker->randomNumber(3, true),
            'total_votes' => $this->faker->randomNumber(2, false)

        ];
    }
}
