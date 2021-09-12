<?php

use App\Models\User;
use App\Http\Livewire\ShowRecipe;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
it('has recipe page', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get('/recipes/1');
    $response->assertOk();

    $response->assertSeeLivewire(ShowRecipe::class);
});
