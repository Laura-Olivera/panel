<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoContacto extends Model
{
    protected $table ='empleado_contacto';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'empleado_id',
        'nombre',
        'telefono',
        'direccion',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
