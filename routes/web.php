<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProductoController;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    return view('index');
});

// Route::get('productos/pdf', [ProductoController::class, 'pdf'])->name('productos.pdf');

// Para poner un middleware "Route::resource('categorias', CategoriaController::class)->middleware('auth')"
// También se puede crear un grupo con el middleware
// Route::middleware('auth')->group(function(){
//     Route::resource('categorias', CategoriaController::class);
//     Route::resource('productos', ProductoController::class);
// });
// O también se puede declarar a nivel de controlador con public function __construct(){ $this->middleware('auth'); }

Route::resource('categorias', CategoriaController::class)->middleware('auth');
Route::resource('productos', ProductoController::class);

Route::get('/compras', function () {
    // Se obtienen los productos que compró el usuario actual
    $usuario = User::where('id', Auth::id())->get()[0];
    $compras = $usuario->productosComprados;

    return view("compras/compras", compact('compras'));
})->name('compras');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
