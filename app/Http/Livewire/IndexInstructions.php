<?php

namespace App\Http\Livewire;

use Livewire\Component;

class IndexInstructions extends Component
{
    public $instructions;

    public function render()
    {
        return view('livewire.index-instructions');
    }
}
