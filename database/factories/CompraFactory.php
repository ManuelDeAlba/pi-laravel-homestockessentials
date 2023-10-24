<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CompraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productos_ids = Producto::pluck('id')->toArray();
        $usuarios_ids = User::pluck('id')->toArray();

        return [
            'producto_id' => fake()->randomElement($productos_ids),
            'user_id' => fake()->randomElement($usuarios_ids),
            'cantidad' => fake()->numberBetween(1, 10)
        ];
    }
}
