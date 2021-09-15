<?php

use App\Models\User;
use App\Models\Recipe;
use Livewire\Livewire;
use App\Http\Livewire\IndexInstructions;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\withoutExceptionHandling;

uses(RefreshDatabase::class);

it('has indexinstructions page', function () {
    $user = User::factory()->create();
    $recipe = Recipe::factory()->create(['user_id'=>$user->id]);
    $response = $this->actingAs($user)->get('/recipes/' . $recipe->id);

    $response->assertStatus(200);

    $response->assertSeeLivewire(IndexInstructions::class);
});

it('can show all instructions on the page', function () {
    withoutExceptionHandling();
    $instructions = collect([
                ['title' => 'First title', 'content' => 'Some Content'],
                ['title' => 'Second title', 'content' => 'Some other content'],
        ]);
    Livewire::test(IndexInstructions::class, ['instructions' => $instructions])
            ->assertSee('First title')
            ->assertSee('Some other content');
});
