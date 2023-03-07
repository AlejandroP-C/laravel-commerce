<?php

namespace Database\Factories;

use App\Models\Commerce;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tickets>
 */
class TicketsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'message' => $this->faker->text(100),
            'date' => $this->faker->date($format = 'Y-m-d'),
            'commerce_id' => Commerce::all()->random()->id,
        ];
    }
}
