<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntradaProducto extends Model
{
    protected $table = "inventario_entradas_productos";
    public $primarykey = false;
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'entrada_id',
        'producto_id',
        'cantidad',
        'costo_total',
        'comentario',
    ];
}
