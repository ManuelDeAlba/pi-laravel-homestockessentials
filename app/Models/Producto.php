<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Para permitir mass assignment
    protected $fillable = ['nombre', 'precio_compra', 'precio_venta', 'categoria_id'];
    // protected $guarded = ['_token']; // Lo opuesto a fillable, en este caso no aceptamos que se mande _token

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
