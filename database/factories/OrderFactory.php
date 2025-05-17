<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomElement(\App\Models\User::pluck('id')->toArray()),
            'total_amount' => $this->faker->randomFloat(2, 10, 1000),
            'shipping_address' => $this->faker->address,
            'status' => $this->faker->randomElement(OrderStatus::values()),
            'shipping_cost' => $this->faker->randomFloat(2, 5, 50),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
