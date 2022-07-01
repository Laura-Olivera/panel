<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $table ="inventario_entradas";
    protected $primarykey = "id";
    public $timestamps = true;
    protected $fillable = [
        'id',
        'proveedor_id',
        'factura',
        'fac_fecha',
        'fac_path',
        'fac_total',
        'notas',
        'estatus',
        'created_user_id',
        'updated_user_id',
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }
}
