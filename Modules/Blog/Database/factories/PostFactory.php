<?php

namespace Modules\Blog\Database\factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Tag;


class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Blog\Entities\Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::where('email','!=','jnandezp@gmail.com')->inRandomOrder()->first();
        $category = Category::inRandomOrder()->first();
        $tag = Tag::inRandomOrder()->first();
        return [
            'cover' => 'https://placekitten.com/1920/1080',
            'thumbnail' => 'https://placekitten.com/192/108',
            'user_id' => $user,
            'category_id' => $category->id,
            'title' => fake()->realText(fake()->numberBetween(10, 20)),
            'content' => fake()->realText(fake()->numberBetween(20, 40)),
        ];
    }
}
