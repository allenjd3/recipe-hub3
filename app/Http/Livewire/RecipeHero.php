<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RecipeHero extends Component
{
    public $title;

    public function render()
    {
        return view('livewire.recipe-hero');
    }
}
