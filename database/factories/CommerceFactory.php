<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commerce>
 */
class CommerceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $name = $this->faker->unique()->sentence();
        $license = $this->faker->randomNumber(8, true) . $this->faker->randomLetter();
        return [
            'name' => $name,
            'license' => $license,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(144),
            'location' => $this->faker->unique()->word(30),
            'validate' => $this->faker->randomElement([1, 2]),
            'status' => $this->faker->boolean(),
            'user_id' => User::all()->random()->id,
        ];
    }
}
