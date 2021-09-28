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
                ['amount' => '3', 'type' => 'cups', 'name' => 'potatoes', 'uid' => uniqid()],
                ['amount' => '2', 'type' => 'slices', 'name' => 'peach', 'uid' => uniqid()]
    ]);
    Livewire::test(IndexIngredients::class, ['ingredients' => $ingredients])
            ->assertSee('potatoes')
            ->assertSee('peach');
});

it('can create an ingredient', function () {
    $user = User::factory()->create();
    $addition = ['amount' => '4', 'type' => 'pans', 'name' => 'plums', 'uid' => uniqid()];

    $ingredients = collect([
                ['amount' => '3', 'type' => 'cups', 'name' => 'potatoes','uid' => uniqid()],
                ['amount' => '2', 'type' => 'slices', 'name' => 'peach','uid' => uniqid()]
    ]);
    $recipe = Recipe::factory()->create([
        'user_id'=>$user->id,
        'ingredients'=>$ingredients
    ]);
    //array merge is important for setting each of the individual values
    Livewire::test(IndexIngredients::class, array_merge(['recipeId' => $recipe->id, 'ingredients' => $ingredients ], $addition))
            ->call('createIngredient');
    $ingredients->add($addition);
    $this->assertEquals($ingredients, $recipe->fresh()->ingredients);
});

it('can set an ingredient from json', function () {
    $recipe = Recipe::factory()->create();
    $ingredient = [
        'amount' => '2',
        'type' => 'cups',
        'name' => 'pickles',
        'uid' => uniqid()
    ];

    $ingredientJson = json_encode($ingredient);
    Livewire::test(IndexIngredients::class, ['recipeId' => $recipe->id, 'ingredients' => $recipe->ingredients])
        ->call('setIngredient', $ingredientJson)
        ->assertSet('amount', '2')
        ->assertSet('type', 'cups')
        ->assertSet('name', 'pickles');
});

it('can update an ingredient', function () {
    //a specific ingredient
    $recipe = Recipe::factory()->create();

    $uid = uniqid();
    $ingredient = [
        'amount' => '2',
        'type' => 'cups',
        'name' => 'pickles',
        'uid' => $uid
    ];
    $ingredientUpdated = [
        'amount' => '2',
        'type' => 'cups',
        'name' => 'rubies',
        'uid' => $uid
    ];
    $recipe->ingredients = $recipe->ingredients->add($ingredient);
    $recipe->save();

    Livewire::test(IndexIngredients::class, array_merge(['recipeId' => $recipe->id, 'ingredients' => $recipe->ingredients], $ingredientUpdated))
        ->call('updateIngredient');
    //can be updated

    $recipe->refresh();
    $this->assertEquals(3, $recipe->ingredients->count());

    //and you can still see all the ingredients in there
    $checkIngredient = $recipe->ingredients->filter(function($ingredient) use($ingredientUpdated) {
        if($ingredient == $ingredientUpdated) {
            return $ingredient;
        }
    });

    $this->assertEquals($checkIngredient->first()['name'], 'rubies');

});
