<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return "Inicio<br><a href='/productos/create'>Crear producto</a><br><a href='/productos/4/edit'>Editar producto 4</a><br><a href='/productos'>Productos</a>";
});

Route::resource('productos', ProductoController::class);