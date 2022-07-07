<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Model;

class InventarioEntradaProducto extends Model
{
    protected $table = "inventario_entradas_productos";
    protected $fillable = [
        'entrada_id',
        'producto_id',
        'cantidad',
        'costo_total',
        'comentario'
    ];
}
