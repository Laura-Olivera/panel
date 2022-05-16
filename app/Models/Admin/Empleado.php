<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Empleado extends Model
{
    protected $table ='empleados';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'nombre',
        'primer_apellido',
        'segundo_apellido',
        'telefono',
        'direccion',
        'clave_empleado',
        'created_user_id',
        'updated_user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
