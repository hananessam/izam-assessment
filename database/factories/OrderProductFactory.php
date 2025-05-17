<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderProduct>
 */
class OrderProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => $this->faker->randomElement(\App\Models\Order::pluck('id')->toArray()),
            'product_id' => $this->faker->randomElement(\App\Models\Product::pluck('id')->toArray()),
            'quantity' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'total' => function (array $attributes) {
                return $attributes['price'] * $attributes['quantity'];
            },
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
