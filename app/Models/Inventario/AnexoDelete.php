<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnexoDelete extends Model
{
    protected $table = "entradas_anexos_delete";
    protected $primarykey = "id";
    public $timestamps = false;
    protected $fillable = [
        "id",
        "cve_anexo",
        "comentario",
        "user_id",
        "user_name",
        "deleted_at",
    ];
}
