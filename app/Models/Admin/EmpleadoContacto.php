<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoContacto extends Model
{
    public $fiilable = [
        'empleado_id',
        'nombre',
        'telefono',
        'direccion',
    ];
}
