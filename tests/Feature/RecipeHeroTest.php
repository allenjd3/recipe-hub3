<?php

use App\Models\User;
use Livewire\Livewire;
use App\Http\Livewire\RecipeHero;
use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
it('has recipehero page', function () {
    $user = User::factory()->create();
    $recipe = Recipe::factory()->create(['user_id'=>$user->id]);
    $response = $this->actingAs($user)->get('/recipes/' . $recipe->id);

    $response->assertStatus(200);
    $response->assertSeeLivewire(RecipeHero::class);
});

it('has a title that is visible', function () {
    Livewire::test(RecipeHero::class)
            ->set('title', 'Amazing Title')
            ->assertSee('Amazing Title');
});
