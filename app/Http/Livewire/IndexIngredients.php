<?php

namespace App\Http\Livewire;

use Livewire\Component;

class IndexIngredients extends Component
{
    public $ingredients;

    public function render()
    {
        return view('livewire.index-ingredients');
    }
}
