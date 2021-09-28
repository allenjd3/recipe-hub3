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
            'instructions' => collect([
                ['title' => 'First', 'content' => 'This is my first Content.', 'uid' => uniqid()],
                ['title' => 'Second', 'content' => 'This is my second Content.', 'uid' => uniqid()],
            ]),
            'ingredients' => collect([
                ['amount' => '3', 'type' => 'cups', 'name' => 'potatoes', 'uid' => uniqid()],
                ['amount' => '2', 'type' => 'slices', 'name' => 'peach', 'uid' => uniqid()]
            ]),
            'user_id' => User::factory()->create()
        ];
    }
}
