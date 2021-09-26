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

    public $showCreateIngredient = false;

    public $showEditIngredient = false;

    public $showButton = true;

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

        $recipe->ingredients = $this->ingredients;

        $recipe->save();

        $this->amount = '';
        $this->type = '';
        $this->name = '';
    }

    public function setIngredient($ingredientJson)
    {
        $ingredient = json_decode($ingredientJson, true);

        $this->amount = $ingredient['amount'];
        $this->name = $ingredient['name'];
        $this->type = $ingredient['type'];
    }
}

