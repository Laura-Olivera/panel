<?php

namespace App\Models\Catalogos;

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
        'precio_compra',
        'precio_venta',
        'cantidad',
        'categoria_id',
        'estatus',
        'created_user_id',
        'updated_user_id',
    ];

    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function proveedores()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function entradas()
    {
        return $this->belongsToMany(Entradas::class);
    }
}
