<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'content' => $this->faker->text,
            'image' => $this->faker->imageUrl,
            'likes' => random_int(0, 1000),
            'is_published' => 1,
            'category_id' => Category::all()->random()->id,
        ];
    }
}
