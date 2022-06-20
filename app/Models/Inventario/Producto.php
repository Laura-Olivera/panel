<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "productos";
    protected $primarykey = "id";
    public $timestamps = true;
    protected $fillable = [
        'id',
        'nombre',
        'descrip_gral',
        'descrip_tec',
        'modelo',
        'marca',
        'proveedor_id',
        'codigo',
        'costo',
        'cantidad',
        'categoria_id',
        'estatus',
        'created_user_id',
        'updated_user_id',
    ];
}
