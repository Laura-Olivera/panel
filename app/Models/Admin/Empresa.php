<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';
    protected $primarykey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'direccion',
        'logo',
        'color',
        'estatus',
        'created_user_id',
        'updated_user_id',
    ];
}
