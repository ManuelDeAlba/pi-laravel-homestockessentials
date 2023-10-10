<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias/categorias', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.formularioCrearCategoria');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Se validan los datos de la categoría
        $request->validate([
            "nombre" => "required|string|min:5"
        ]);
        
        // Se guarda la categoría en la base de datos
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect('/categorias');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        // Regresa la vista solo con esa categoria
        return view('categorias/categorias', ['categorias' => [$categoria]]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        // Se regresa una vista con el formulario
        return view('categorias/formularioEditarCategoria', ['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        // Se validan los datos de la categoría
        $request->validate([
            "nombre" => "required|string|min:5"
        ]);
        
        // Se guarda la categoría en la base de datos
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect('/categorias');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        
        return redirect("/categorias");
    }
}
