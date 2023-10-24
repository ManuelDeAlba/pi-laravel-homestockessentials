<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Se obtienen los productos que compró el usuario actual
        $usuario = User::find(Auth::id());
        $compras = $usuario->productosComprados;

        // Se sobreescribe la cantidad para usar la cantidad comprada
        foreach($compras as $compra){
            $compra->cantidad = $compra->pivot->cantidad;
            $compra->compra_id = $compra->pivot->id;
        }

        return view("compras/compras", compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Como no se le puede pasar la id del producto, este método redirecciona a productos
        return redirect(route('productos.index'));
    }

    public function createWithProductId(string $producto_id){
        $producto = Producto::find($producto_id);
        return view("compras/formularioCrearCompra", compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Se le agrega el id del usuario a la request y se crea la compra
        $request->merge(['user_id' => Auth::id()]);
        Compra::create($request->all());

        return redirect('/compras');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Se muestra el producto seleccionado solo si es del usuario
        $compras = Compra::where('id', $id)->where('user_id', Auth::id())->first();
        
        if($compras){
            $producto = Producto::find($compras->producto_id);

            // Se sobreescribe la cantidad para usar la cantidad comprada
            $producto->cantidad = $compras->cantidad;
            $producto->compra_id = $compras->id;

            return view("compras/compras", ['compras' => [$producto]]);
        } else {
            return redirect('/compras');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Las compras no se pueden editar
        return redirect('/compras');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Las compras no se pueden editar
        return redirect('/compras');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Las compras no se pueden borrar
        return redirect('/compras');
    }
}
