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
                ['title' => 'First', 'content' => 'This is my first Content.'],
                ['title' => 'Second', 'content' => 'This is my second Content.'],
            ]),
            'ingredients' => collect([
                ['amount' => '3', 'type' => 'cups', 'name' => 'potatoes'],
                ['amount' => '2', 'type' => 'slices', 'name' => 'peach']
            ]),
            'user_id' => User::factory()->create()
        ];
    }
}
