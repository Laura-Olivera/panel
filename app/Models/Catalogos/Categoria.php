<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "categorias";
    protected $primarykey = "id";
    public $timestamps = true;
    protected $fillable = [
        'id',
        'nombre',
        'cve_cat',
        'estatus',
        'created_user_id',
        'updated_user_id',
    ];
}
