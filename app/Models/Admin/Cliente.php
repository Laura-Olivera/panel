<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primarykey = 'id';
    public $timestamps = true;
    protected $filleable = [
        'user_id',
        'clave_clinte',
        'nombre',
        'primer_apellido',
        'segundo_apellido',
        'telefono',
        'slug',
    ];
}
