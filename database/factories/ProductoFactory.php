<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Opcion 1: $this->faker->name()
        // Opcion 2 (helper): faker()->name()

        // Se genera la categoría, es del 1 al 9 porque son las ID de las categorias manuales en CategoriaSeeder
        $categoria_id = fake()->numberBetween(1, 9);
        $nombre = Categoria::find($categoria_id)->nombre . " ejemplo";

        return [
            'nombre' => $nombre,
            'img' => fake()->imageUrl(),
            'categoria_id' => $categoria_id,
            'precio_compra' => fake()->numberBetween(0, 100000),
            'precio_venta' => fake()->numberBetween(0, 100000),
            'cantidad' => fake()->numberBetween(0,10)
        ];
    }
}
