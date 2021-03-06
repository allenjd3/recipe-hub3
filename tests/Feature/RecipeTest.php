<?php

use App\Models\User;
use App\Http\Livewire\ShowRecipe;
use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
it('has recipe page', function () {
    $user = User::factory()->create();
    $recipe = Recipe::factory()->create();
    $response = $this->actingAs($user)->get('/recipes/' . $recipe->id);
    $response->assertOk();

    $response->assertSeeLivewire(ShowRecipe::class);
});
