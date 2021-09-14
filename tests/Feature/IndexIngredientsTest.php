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
            ->assertSee('potatoes');
});
