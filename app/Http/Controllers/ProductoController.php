<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return DB::table('producto')->get(); // Con Query Builder
        return Producto::all(); // Eloquent
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Se regresa una vista con el formulario
        return view('productos/formularioCrearProducto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {       
        // Se crea el objeto con los datos de la petición
        $producto = new Producto;
        $producto->nombre = $request->nombre;
        $producto->precio_compra = $request->precio_compra;
        $producto->precio_venta = $request->precio_venta;
        $producto->categoria = $request->categoria;

        $producto->save();

        return redirect('/productos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return $producto;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        // Se regresa una vista con el formulario
        return view('productos/formularioEditarProducto', ['id' => $producto->id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->nombre = $request->nombre;
        $producto->precio_compra = $request->precio_compra;
        $producto->precio_venta = $request->precio_venta;
        $producto->categoria = $request->categoria;

        $producto->save();

        return redirect("/productos/$producto->id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
    }
}
