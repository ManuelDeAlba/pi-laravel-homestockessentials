<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable(false);
            $table->string('img')->nullable(true);
            $table->unsignedBigInteger('categoria_id');
            $table->float('precio_compra')->nullable(false);
            $table->float('precio_venta')->nullable(false);
            $table->integer('cantidad')->default(0);
            $table->timestamps();
            
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            // $table->foreignId('categoria_id')->constrained(); // Solo si se sigue el estandar
            
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
