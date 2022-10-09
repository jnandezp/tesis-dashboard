<?php

namespace Modules\Post\Database\factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Post\Entities\Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::where('email','!=','jnandezp@gmail.com')->inRandomOrder()->first();
        return [
            'cover' => 'https://placekitten.com/1920/1080',
            'thumbnail' => 'https://placekitten.com/192/108',
            'user_id' => $user,
            'title' => fake()->realText(fake()->numberBetween(10, 20)),
            'content' => fake()->realText(fake()->numberBetween(20, 40)),
        ];
    }
}
