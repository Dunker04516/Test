<?php

namespace App\Http\Controllers;

use App\Models\Animales;
use App\Models\Especie;
use App\Models\Habitat;
use Illuminate\Http\Request;

class ZooCotroller extends Controller
{
    function index()
    {
        $animales = Animales::all();
        $especies = Especie::all();
        $habitats = Habitat::all();
        return view('welcome', [
            'animales' => $animales,
            'especies' => $especies,
            'habitats' => $habitats
        ]);
    }

    function crear()
    {
        $especies = Especie::all();
        $habitats = Habitat::all();
        return view('form', [
            'form_edit' => false,
            'especies' => $especies,
            'habitats' => $habitats
        ]);
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'especie' => 'required',
            'habitat' => 'required'
        ]);

        Animales::create([
            'nombre' => $request->nombre,
            'especie' => $request->especie,
            'habitat' => $request->habitat
        ]);

        return redirect()->route('index');
    }

    function editar($id_animal)
    {
        $animal = Animales::findOrfail($id_animal);
        $especies = Especie::all();
        $habitats = Habitat::all();
        return view('form', [
            'form_edit' => true,
            'animal' => $animal,
            'especies' => $especies,
            'habitats' => $habitats
        ]);
    }

    public function actualizar(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nombre' => 'required',
            'especie' => 'required',
            'habitat' => 'required'
        ]);

        $animal = Animales::findOrfail($request->id);
        $animal->nombre = $request->nombre;
        $animal->especie = $request->especie;
        $animal->habitat = $request->habitat;
        $animal->save();

        return redirect()->route('index');
    }

    function eliminar(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:animales,id'
        ]);

        $animal = Animales::findOrfail($request->id);
        $animal->delete();

        return redirect()->route('index');
    }
}
