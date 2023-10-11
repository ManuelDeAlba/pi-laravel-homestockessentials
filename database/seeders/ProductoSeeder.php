<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Opción 1 (eloquent)
        $producto = new Producto();
        $producto->nombre = "Ejemplo eloquent";
        $producto->precio_compra = 100;
        $producto->precio_venta = 200;
        $producto->categoria_id = 1;
        $producto->save();

        // Opción 2 (query builder)
        DB::table('productos')->insert([
            'nombre' => "Ejemplo query builder",
            'precio_compra' => 100,
            'precio_venta' => 200,
            'categoria_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Opción 3 (factory)
        Producto::factory()->count(2)->create();
    }
}
