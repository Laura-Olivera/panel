<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    protected $primarykey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'nombre',
        'cve_area',
        'estatus',
        'created_user_id',
        'updated_user_id',
    ];

}
