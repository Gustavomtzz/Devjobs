<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Illuminate\Support\Facades\File;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditarVacante extends Component
{
    public $titulo;
    public $salario_id;
    public $categoria_id;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagenAnterior;
    public $vacante;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'salario_id' => 'required|integer|between:1,9',
        'categoria_id' => 'required|integer|between:1,7',
        'empresa' => 'required',
        'ultimo_dia' => 'required|date',
        'descripcion' => 'required|string',
        'imagen' => 'nullable|image|max:1024',
    ];
    public function mount(Vacante $vacante)
    {
        // Verificar que el usuario autenticado pueda editar las vacantes
        $this->authorize('update', $this->vacante);

        //Asignar al objeto las propiedades de la vacante que le pasamos
        $this->titulo = $vacante->titulo;
        $this->salario_id = $vacante->salario_id;
        $this->categoria_id = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = $vacante->ultimo_dia->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->titulo = $vacante->titulo;
        $this->imagenAnterior = $vacante->imagen;
        $this->vacante = $vacante;
    }

    public function editarVacante()
    {
        //Si pasa la VALIDACION se asigna a datos
        $datos = $this->validate();

        //Almacenar la imagen
        if ($this->imagen) {
            //Agregar la nueva Imagen
            $imagen = $this->imagen->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);

            //Verificar si esta lleno la columna de imagen
            if (!empty($this->imagenAnterior)) {

                //Directorio de la imagen
                $imagenPath = public_path('storage/vacantes/' . $this->imagenAnterior);

                //Verificar que exista el Archivo
                if (File::exists($imagenPath)) {
                    //Borrar imagen anterior
                    File::delete($imagenPath);
                }
            }
        }

        //Actualizar la Vacante
        $this->vacante->update([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario_id'],
            'categoria_id' => $datos['categoria_id'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'] ?? $this->imagenAnterior,
            'user_id' => Auth()->user()->id,
        ]);

        //Crear un mensaje
        session()->flash('message', 'vacante-actualizada');

        //Redireccionar al Usuario
        return redirect()->route('vacantes.index');
    }


    public function render()
    {

        $salarios = Salario::all();
        $categorias = Categoria::all();


        return view('livewire.editar-vacante', ['salarios' => $salarios, 'categorias' => $categorias]);
    }
}
