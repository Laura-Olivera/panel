<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primarykey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'clave_cliente',
        'nombre_completo',
        'telefono',
        'slug',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
