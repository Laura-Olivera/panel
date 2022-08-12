<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = "proveedores";
    protected $primarykey = "id";
    public $timestamps = true;
    protected $fillable = [
        'id',
        'cve_prov',
        'nombre',
        'rfc',
        'telefono',
        'extension',
        'direccion',
        'email',
        'estatus',
        'created_user_id',
        'updated_user_id',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }
}
