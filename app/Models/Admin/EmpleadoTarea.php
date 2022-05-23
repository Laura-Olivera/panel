<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoTarea extends Model
{
    protected $table = 'empleado_tarea';
    public $timestamps = false;
    protected $fillable = [
        'tarea_id',
        'empleado_id'
    ];
}
