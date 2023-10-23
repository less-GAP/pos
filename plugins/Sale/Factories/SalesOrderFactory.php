<?php

namespace Plugins\Sale\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Plugins\Sale\Models\SalesOrder;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class SalesOrderFactory extends Factory
{
    protected $model = SalesOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::all()->pluck('id')->toArray();

        return [
            'order_status' => fake()->randomElement(['pending','cancel', 'success']),
            'payment_status' => fake()->randomElement(['pending', 'success']),
            'total_price' => fake()->randomDigitNotZero(),
            'total_paid' => fake()->randomDigitNotZero(),
            'sale_id' => fake()->randomElement($userIds),
            'order_code' => fake()->ean8(),
            'created_by' => 'admin',
            'updated_by' => 'admin',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    // public function unverified(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }
}
