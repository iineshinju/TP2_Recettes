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
        // Permet la création de fausses données pour les recettes
        return [
            'author_id' => $this->faker->randomDigit,
            'title' => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'content' => $this->faker->paragraph($nbSentences = 5, $variableNbSentences = true),
            'ingredients' => $this->faker->paragraph($nbSentences = 1, $variableNbSentences = false),
            'url' => $this->faker->url(),
            'tags' => $this->faker->sentence($nbWords = 7, $variableNbWords = false),
            //'date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'status' => $this->faker->randomElement($array = ["Nouveau", "Mis à jour"]),
        ];
    }
}
