<?php

use App\Models\User;
use App\Models\Recipe;
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
