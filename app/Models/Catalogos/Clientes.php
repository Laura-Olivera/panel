<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = "clientes";
    protected $primarykey = "id";
    public $timestamps = true;
    protected $fillable = [
        "id",
        "nombre",
        "rfc",
        "direccion",
        "email",
        "estatus",
        "created_user_id",
        "updated_user_id",
    ];
}
