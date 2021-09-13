<?php

use App\Models\User;
use App\Http\Livewire\ModifyPortions;
use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
it('has modifyportions page', function () {
    $user = User::factory()->create();
    $recipe = Recipe::factory()->create();
    $response = $this->actingAs($user)->get('/recipes/' . $recipe->id);

    $response->assertStatus(200);

    $response->assertSeeLivewire(ModifyPortions::class);
});
