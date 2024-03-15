<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacante extends Component
{

    protected $listeners = ['destroy'];


    public function destroy(Vacante $vacante)
    {
        $this->authorize('delete', $vacante);
        $vacante->delete();
    }

    public function render()
    {
        $vacantes = Vacante::where('user_id', auth()->id())->paginate(2);

        return view('livewire.mostrar-vacante', ['vacantes' => $vacantes]);
    }
}
