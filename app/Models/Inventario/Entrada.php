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
        "cve_entrada",
        "proveedor_id",
        "factura",
        "fac_fecha_emision",
        "fac_fecha_operacion",
        "fac_path",
        "fac_subtotal",
        "fac_impuestos",
        "fac_extras",
        "fac_total",
        "fac_total_letra",
        "fac_forma_pago",
        "fac_metodo_pago",
        "fac_notas",
        "entrada_notas",
        "fecha_recepcion",
        "anio",
        "consecutivo",
        "created_user",
        "updated_user",
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }
}
