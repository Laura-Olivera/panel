<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    protected $table ="inventario_entradas_anexos";
    protected $primarykey = "id";
    public $timestamps = true;
    protected $fillable = [
        'id',
        'consecutivo',
        "entrada_id",
        "fac_forma_pago",
        "fac_parcialidad",
        "fac_saldo_anterior",
        "fac_saldo_insoluto",
        "fac_total_letra",
        "fac_fecha_emision",
        "fac_fecha_operacion",
        "fac_path",
        "fac_notas",
        "anexo_notas",
        "estatus",
        "consecutivo",
        "created_user",
        "updated_user",
        "cve_anexo",
        "fac_total"
    ];
}