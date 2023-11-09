<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

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
        
        // Si quisieramos filtrar los productos por creador
        // $productos = Producto::where('user_id', Auth::id())->get();

        // Eager loading (with y la relacion que tiene que cargar (método dentro de Producto))
        $productos = Producto::with("categoria", "user")->get();
        return view('productos/productos', ['productos' => $productos]);
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
        $request->merge(['user_id' => Auth::id()]); // Se le agrega al request el id del usuario con la sesión activa
        $producto = Producto::create($request->all());

        // El archivo por ahora está guardado en una carpeta temporal del servidor
        // Para eso tenemos que decidir que hacer con el archivo
        if($request->file('img')->isValid()){
            // Se puede poner cualquier nombre de carpeta pero si la ponemos en public es accesible por el navegador
            $path = $request->file('img')->store("public/img-productos");

            $producto->img = $path;
            $producto->save();
        }

        // $producto = new Producto();
        // $producto->user_id = Auth::id(); // Se obtiene el id del usuario con la sesión activa
        // $producto->nombre = $request->nombre;
        // $producto->precio_compra = $request->precio_compra;
        // $producto->precio_venta = $request->precio_venta;
        // $producto->categoria_id = $request->categoria_id;

        // $producto->save();

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
    public function edit(Request $request, Producto $producto)
    {
        // Usar el gate para verificar permisos y no darle permisos de abrir el formulario si no está permitido
        // if(!Gate::allows('editar-producto', $producto)){
        //     abort(403);
        // }

        // Con policy (se puede usar cannot o can con negacion !)
        if($request->user()->cannot('update', $producto)){
            abort(403);
        }

        // También con policy
        $this->authorize('update', $producto);

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
        Producto::where('id', $producto->id)->update($request->except('_token', '_method', 'img')); // Query builder

        // Se borra la imagen anterior
        $prod = Producto::find($producto->id);
        Storage::disk('public')->delete($producto->img);

        // Se guarda la nueva imagen
        if($request->file('img')->isValid()){
            // Se puede poner cualquier nombre de carpeta pero si la ponemos en public es accesible por el navegador
            $path = $request->file('img')->store("public/img-productos");

            $prod->img = $path;
            $prod->save();
        }

        // return redirect("/productos/$producto->id");
        return redirect("/productos");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $this->authorize('delete', $producto);

        $producto->delete();
        
        return redirect("/productos");
    }

    public function indexBorrados(){
        $borrados = Producto::onlyTrashed()->get();
        
        return view('productos/productosBorrados', ['productos' => $borrados]);
    }

    public function restore($id){
        $producto = Producto::onlyTrashed()->where('id', $id)->get()[0];
        
        $this->authorize('restore', $producto);

        $producto->restore();

        return redirect("/productos");
    }

    public function forceDelete($id){
        $producto = Producto::onlyTrashed()->where('id', $id)->get()[0];
        
        $this->authorize('forceDelete', $producto);

        $producto->forceDelete();

        return redirect("/productos/borrados");
    }
}
