<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provedor extends Model
{
    protected $table = 'proveedores';
    protected $primarykey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'nombre',
        'descrip',
        'path',
        'slug',
        'clave_prov',
        'estatus',
        'created_user_id',
        'updated_user_id',
    ];
}
