<?php

namespace Modules\Company\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Company\Entities\Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->company();
        return [
            'name' => $name,
            'name-slug' => Str::slug($name, '-'),
            'description' => $this->faker->text(100),
            'rfc' => 'XAXX010101000',
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(), // password
            'web' => $this->faker->url(),
            'email' => $this->faker->companyEmail(),
            'logo' => 'https://placekitten.com/1920/1080',
            'slogan' => $this->faker->text(100),
        ];
    }
}

