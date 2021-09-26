<?php

use App\Models\User;
use App\Models\Recipe;
use Livewire\Livewire;
use App\Http\Livewire\IndexIngredients;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);


it('has indexingredients page', function () {
    $user = User::factory()->create();
    $recipe = Recipe::factory()->create(['user_id'=>$user->id]);

    $response = $this->actingAs($user)->get('/recipes/' . $recipe->id);

    $response->assertStatus(200);

    $response->assertSeeLivewire(IndexIngredients::class);
});

it('can show all ingredients on the page', function () {
    $ingredients = collect([
                ['amount' => '3', 'type' => 'cups', 'name' => 'potatoes'],
                ['amount' => '2', 'type' => 'slices', 'name' => 'peach']
    ]);
    Livewire::test(IndexIngredients::class, ['ingredients' => $ingredients])
            ->assertSee('potatoes')
            ->assertSee('peach');
});

it('can create an ingredient', function () {
    $user = User::factory()->create();
    $addition = ['amount' => '4', 'type' => 'pans', 'name' => 'plums'];

    $ingredients = collect([
                ['amount' => '3', 'type' => 'cups', 'name' => 'potatoes'],
                ['amount' => '2', 'type' => 'slices', 'name' => 'peach']
    ]);
    $recipe = Recipe::factory()->create([
        'user_id'=>$user->id,
        'ingredients'=>$ingredients
    ]);
    Livewire::test(IndexIngredients::class, array_merge(['recipeId' => $recipe->id, 'ingredients' => $ingredients], $addition))
            ->call('createIngredient');
    $ingredients->add($addition);
    $this->assertEquals($ingredients, $recipe->fresh()->ingredients);
});

it('can set an ingredient from json', function () {
    $recipe = Recipe::factory()->create();
    $ingredient = [
        'amount' => '2',
        'type' => 'cups',
        'name' => 'pickles'
    ];

    $ingredientJson = json_encode($ingredient);
    Livewire::test(IndexIngredients::class, ['recipeId' => $recipe->id, 'ingredients' => $recipe->ingredients])
        ->call('setIngredient', $ingredientJson)
        ->assertSet('amount', '2')
        ->assertSet('type', 'cups')
        ->assertSet('name', 'pickles');
});
