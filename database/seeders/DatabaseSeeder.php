<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Llama a todos los seeders que se establezcan aquí para solo usar un comando
        // php artisan db:seed --class DatabaseSeeder
        $this->call([
            UserSeeder::class,
            CategoriaSeeder::class,
            ProductoSeeder::class
        ]);
    }
}
