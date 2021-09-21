<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class IndexIngredients extends Component
{
    public $ingredients;

    public $amount;

    public $type;

    public $name;

    public $recipeId;

    public function render()
    {
        return view('livewire.index-ingredients');
    }

    public function createIngredient()
    {
        $recipe = Recipe::find($this->recipeId);

        $this->ingredients->add([
            'amount' => $this->amount,
            'type' => $this->type,
            'name' => $this->name
        ]);
        $this->render();

        $recipe->ingredients = $this->ingredients;

        $recipe->save();
    }
}
