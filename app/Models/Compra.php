<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    
    // Para permitir mass assignment
    protected $fillable = ['user_id', 'producto_id', 'cantidad'];

    public $timestamps = false;
}
