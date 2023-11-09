<?php

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get("productos", function(){
    return Producto::all();
});

Route::get("productos/{id}", function($id){
    return Producto::find($id);
});

Route::get("categorias", function(){
    return Categoria::all();
});

Route::get("categorias/{id}", function($id){
    return Categoria::find($id);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
