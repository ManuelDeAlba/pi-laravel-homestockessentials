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
        return view('productos/productos', ['productos' => Producto::all()]);
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
        // Se validan los datos de la petición
        $request->validate([
            'nombre' => 'required|string|min:5',
            'precio_compra' => 'required|numeric',
            'precio_venta' => 'required|numeric',
            'categoria' => 'required|string'
        ]);

        // Se crea el objeto con los datos de la petición
        $producto = new Producto();
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
        // Regresa la vista solo con ese producto
        return view('productos/productos', ['productos' => [$producto]]);
        // return $producto; // Regresa el json con los datos del producto
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        // Se regresa una vista con el formulario
        return view('productos/formularioEditarProducto', ['producto' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|min:5',
            'precio_compra' => 'required|numeric',
            'precio_venta' => 'required|numeric',
            'cantidad' => 'required|numeric|min:0',
            'categoria' => 'required|string'
        ]);

        $producto->nombre = $request->nombre;
        $producto->precio_compra = $request->precio_compra;
        $producto->precio_venta = $request->precio_venta;
        $producto->cantidad = $request->cantidad;
        $producto->categoria = $request->categoria;

        $producto->save();

        // return redirect("/productos/$producto->id");
        return redirect("/productos");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        
        return redirect("/productos");
    }
}
