<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'nombre' => $this->faker->randomElement(["Sábana ejemplo", "Cobija ejemplo", "Frazada ejemplo", "Colcha ejemplo", "Cortina ejemplo"]),
            'img' => fake()->imageUrl(),
            'categoria_id' => fake()->numberBetween(1, 9),
            'precio_compra' => fake()->numberBetween(0, 100000),
            'precio_venta' => fake()->numberBetween(0, 100000),
            'cantidad' => fake()->numberBetween(0,10)
        ];
    }
}
