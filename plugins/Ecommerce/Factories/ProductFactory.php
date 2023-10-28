<?php

namespace Plugins\Sale\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Plugins\Sale\Models\Category;
use Plugins\Sale\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => fake()->name(),
            'price' => fake()->randomDigit(),
            'unit' => 'kg',
            'product_code' => fake()->ean8(),
            'short_description' => fake()->text(),
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
