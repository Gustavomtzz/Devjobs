<?php

namespace App\Livewire;

use Livewire\Component;

class FormValidationErrors extends Component
{

    public $message;


    public function render()
    {
        return view('livewire.form-validation-errors');
    }
}
