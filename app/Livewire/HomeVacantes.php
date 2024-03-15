<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{
    public $categorias;
    public $salarios;
    public $termino;
    public $categoria;
    public $salario;

    protected $listeners = ['buscar'];


    public function buscar($termino, $categoria, $salario)
    {
        if ($categoria === "NULL") {
            dd('Valor Vacio');
        }
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
    }


    public function render()
    {
        $vacantes = Vacante::when($this->termino, function ($query) {
            $query->where('titulo', 'LIKE', '%' . $this->termino . '%');
        })
            ->when($this->termino, function ($query) {
                $query->orWhere('empresa', 'LIKE', '%' . $this->termino . '%');
            })
            ->when($this->categoria, function ($query) {
                if (is_numeric($this->categoria)) {
                    $query->where('categoria_id', $this->categoria);
                }
            })
            ->when($this->salario, function ($query) {
                if (is_numeric($this->salario)) {
                    $query->where('salario_id', $this->salario);
                }
            })

            ->paginate(20);




        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes,
        ]);
    }
}
