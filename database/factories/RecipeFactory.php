<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_id' => $this->faker->randomDigit,
            'title' => Str::random(15),
            'content' => Str::random(200),
            'ingredients' => Str::random(50),
            'url' => $this->faker->url(),
            'tags' => Str::random(15),
            //'date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'status' => Str::random(20),
        ];
    }
}
