<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Vacante::class);
        $vacantes = Vacante::all();

        return view('vacantes.index', ['vacantes' => $vacantes]);
    }
    public function create()
    {
        $this->authorize('create', Vacante::class);
        return view('vacantes.create');
    }

    public function edit(Vacante $vacante)
    {
        return view('vacantes.edit', ['vacante' => $vacante]);
    }

    public function show(Vacante $vacante)
    {
        return view('vacantes.show', ['vacante' => $vacante]);
    }
}
