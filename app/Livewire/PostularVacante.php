<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Candidato;
use App\Notifications\NuevoCandidato;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    //Habilitar Subida de archivos con Livewire\WithFileUploads class
    use WithFileUploads;

    public $vacante;
    public $cv;

    protected $rules = [
        'cv' => 'required|mimes:pdf',
    ];


    public function postularme()
    {
        $datos = $this->validate();

        // validar que el usuario no haya postulado a la vacante
        if ($this->vacante->candidatos()->where('user_id', auth()->user()->id)->count() > 0) {

            //Mostrar a el usuario mensaje de que ya posee una vacante enviada
            return back()->with('message', 'postulante-duplicado');
        }


        //Almacenar el CV
        $cv = $this->cv->store('public/postulantes');
        //String con el nombre del archivo para asignar a la BD
        $datos['cv'] = str_replace('public/postulantes/', '', $cv);

        //Crear el Postulante
        $this->vacante->candidatos()->create([
            'user_id' => Auth()->id(),
            'cv' => $datos['cv'],
        ]);


        /** Enviar un Email al usuario 
         * Notify metodo que sirve para notificar al usuario
         *
         */

        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, Auth()->id()));

        //Mostrar a el usuario mensaje de que se envio correctamente
        return back()->with('message', 'postulante-creada');
    }



    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
