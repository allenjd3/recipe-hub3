<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class ShowRecipe extends Component
{
    public $recipe;

    public function mount(Recipe $recipe)
    {
        $this->recipe = $recipe;
    }

    public function render()
    {
        return view('livewire.show-recipe');
    }
}
