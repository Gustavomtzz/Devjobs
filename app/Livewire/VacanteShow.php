<?php

namespace App\Livewire;

use Livewire\Component;

class VacanteShow extends Component
{

    public $vacante;

    public function render()
    {
        return view('livewire.vacante-show');
    }
}
