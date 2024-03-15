<?php

namespace App\Livewire;

use App\Models\Salario;
use Livewire\Component;
use App\Models\Categoria;
use GuzzleHttp\Psr7\Request;
use Hamcrest\Type\IsNumeric;

class FiltrarVacantes extends Component
{
    public $termino;
    public $categoria;
    public $salario;


    public function leerDatosFormulario()
    {
        $this->dispatch('buscar', $this->termino, $this->categoria, $this->salario);
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.filtrar-vacantes', [
            'salarios' => $salarios,
            'categorias' => $categorias,
        ]);
    }
}
