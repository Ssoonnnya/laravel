<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
// use App\Database\Factories\UserFactory;
// use App\Database\Factories\CategoryFactory;
use App\Models\UserFactory;
use App\Models\CategoryFactory;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => UserFactory::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'excerpt' => '<p>' . inplode('<p></p>', $this->faker->paragraph(2)) . '</p>',
            'body' => '<p>' . inplode('<p></p>', $this->faker->paragraph(6)) . '</p>',
        ];
    }
}
