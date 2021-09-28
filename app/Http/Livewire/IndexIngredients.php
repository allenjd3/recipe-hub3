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

    public $uid;

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
            'name' => $this->name,
            'uid'=> $this->uid
        ]);


        $recipe->ingredients = $this->ingredients;

        $recipe->save();

        $this->amount = '';
        $this->type = '';
        $this->name = '';
        $this->uid = '';
    }

    public function setIngredient($ingredientJson)
    {
        $ingredient = json_decode($ingredientJson, true);

        $this->amount = $ingredient['amount'];
        $this->name = $ingredient['name'];
        $this->type = $ingredient['type'];
        $this->uid = $ingredient['uid'];
    }

    public function updateIngredient()
    {
        $this->ingredients = $this->ingredients->reject(function ($value, $key) {
            return $value['uid'] == $this->uid;
        });
        $ingredient = [
            'uid' => $this->uid,
            'amount' => $this->amount,
            'name' => $this->name,
            'type' => $this->type,
        ];

        $recipe = Recipe::find($this->recipeId);

        $this->ingredients->add($ingredient);

        $recipe->ingredients = $this->ingredients;

        $recipe->save();
        $this->render();

        $this->amount = '';
        $this->type = '';
        $this->name = '';
        $this->amount = '';
        $this->type = '';
        $this->name = '';
    }
}
