<?php

namespace Plugins\Sale\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Plugins\Sale\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    protected $model = Customer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'type' => 'walk-in-customer',
            'email' => fake()->unique()->safeEmail(),
			'phone' => fake()->phoneNumber(),
            'email_verified_at' => now(),
            'customer_group' => 0,
			'password' => \Hash::make('123456'), // password
            'referral_code' => Str::random(10),
			'status' => 'A',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
