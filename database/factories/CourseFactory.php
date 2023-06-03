<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => fake()->slug(6),
            'title' => fake()->sentence(),
            'subtitle' => fake()->sentence(),
            'description' => fake()->text(50),
            'image' => fake()->imageUrl(),
            'price' => fake()->boolean() ? 0 : fake()->randomFloat(2, 10, 5000),
            'author_id' => User::inRandomOrder()->first()
        ];
    }
}
