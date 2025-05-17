<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'stock' => $this->faker->numberBetween(0, 100),
            'status' => $this->faker->randomElement([1, 0]), // Assuming 1 is active and 0 is inactive
            'sku' => $this->faker->unique()->word(),
            'meta_title' => $this->faker->sentence(),
            'meta_description' => $this->faker->sentence(),
            'meta_keywords' => $this->faker->word(),
            'slug' => $this->faker->unique()->slug(),
        ];
    }
}
