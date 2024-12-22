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
            'productName' => $this->faker->words(3, true), // Generates a random product name
           // 'productImage' => 'images/products/' . $this->faker->image('public/storage/images/products', 640, 480, null, false), // Fake image
            'productImage' => 'image.jpg',
            'productCategory' => $this->faker->word(), // Random category
            'productDescription' => $this->faker->sentence(10), // Random description
            'productCost' => $this->faker->randomFloat(2, 10, 500), // Cost between 10 and 500
            'productDiscount' => $this->faker->randomFloat(2, 0, 50), // Discount between 0 and 50
            'productReviews' => $this->faker->numberBetween(0, 100), // Random reviews
            'active' => $this->faker->boolean(80), // 80% chance of being active
        ];
    }
}
