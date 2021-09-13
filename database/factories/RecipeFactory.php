<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'title' => $this->faker->sentence(),
            'instructions' => 'not null',
            'ingredients' => 'not null',
            'user_id' => User::factory()->create()
        ];
    }
}
