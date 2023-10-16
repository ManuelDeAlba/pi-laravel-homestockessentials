<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Aquí se aplica el middleware y se especifican las rutas a excluir
    public function __construct(){
        // $this->middleware('auth')->only([]);
        $this->middleware('auth')->except(['index', 'show']);
    }

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
        $categorias = Categoria::all();
        // Se regresa una vista con el formulario
        return view('productos/formularioCrearProducto', compact('categorias'));
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
            'categoria_id' => 'required|integer'
        ]);

        // Se obtiene el objeto con los datos de la request
        // Los name de los input deben ser iguales a los campos de la tabla
        // Para usar mass assignment se tiene que especificar en el modelo las columnas que se van a permitir inyectar de esta forma
        $producto = Producto::create($request->all());

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
        $categorias = Categoria::all();
        // Se regresa una vista con el formulario
        return view('productos/formularioEditarProducto', ['producto' => $producto, 'categorias' => $categorias]);
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
            'categoria_id' => 'required|integer'
        ]);

        // Para la actualización también tenemos que quitar el token y el method pero ya no se utiliza el $fillable del modelo
        // También se puede usar $request->only() para seleccionar solo algunos campos
        // $producto->update($request->except('_token', '_method')); // Eloquent (esta forma no cambia la cantidad)
        Producto::where('id', $producto->id)->update($request->except('_token', '_method')); // Query builder

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
