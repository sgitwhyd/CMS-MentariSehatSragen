<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'description' => $this->faker->sentence,
            'user_id' => 1,
            'content' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(fn ($post) => "<p>$post</p>")->implode(''),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
