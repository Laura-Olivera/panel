<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'tareas';
    protected $primarykey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'tarea',
        'descripcion',
        'modulo',
        'estatus',
        'created_user_id',
        'updated_user_id'
    ];

    public function empleados()
    {
        return $this->belongsToMany(Empleado::class,'empleado_tarea','tarea_id', 'empleado_id');
    }


}
