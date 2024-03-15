<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;

//wire: es una funcion similar a enlazes de datos bi-direccional


class CrearVacante extends Component
{

    public $titulo;
    public $salario_id;
    public $categoria_id;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    protected $user_id;

    //Habilitar Subida de archivos con Livewire\WithFileUploads class
    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'salario_id' => 'required|integer|between:1,9',
        'categoria_id' => 'required|integer|between:1,7',
        'empresa' => 'required',
        'ultimo_dia' => 'required|date',
        'descripcion' => 'required|string',
        'imagen' => 'required|image|max:1024'
    ];

    public function crearVacante()
    {

        //Si pasa la VALIDACION se asigna a datos
        $datos = $this->validate();

        //Almacenar la imagen
        $imagen = $this->imagen->store('public/vacantes');
        $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);

        //Crear la Vacante
        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario_id'],
            'categoria_id' => $datos['categoria_id'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => Auth()->user()->id,
        ]);

        //Crear un mensaje
        session()->flash('message', 'vacante-creada');

        //Redireccionar al Usuario
        return redirect()->route('vacantes.index');
    }


    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.crear-vacante', ['salarios' => $salarios, 'categorias' => $categorias]);
    }
}
