<?php

namespace App\Models;

use App\Models\Admin\Empleado;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasRoles, Notifiable;
    
    protected $fillable = [
        'nombre',
        'primer_apellido',
        'segundo_apellido',
        'curp',
        'rfc',
        'cve_usuario',
        'telefono',
        'area',
        'usuario',
        'email',
        'password',
        'estatus',
        'intentos',
    ];

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
