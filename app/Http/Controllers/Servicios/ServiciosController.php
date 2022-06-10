<?php

namespace App\Http\Controllers\Servicios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ServiciosController extends Controller
{
    public function codigo_postal($codigo)
    {
        $data = HTTP::get('http://localhost:8000/api/codigo_postal/show/'.$codigo);
        $datos = json_decode($data);
        if (is_object($datos)) {
            return $datos;
        } 
    }
}
