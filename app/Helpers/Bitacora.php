<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Bitacoras\BitacoraAdmin;
use App\Models\Bitacoras\BitacoraCliente;

class Bitacora
{
    public static function admin(Request $request, string $action) : void
    {
        $user = Auth::user();
        $user_id = $user->id?? null;
        $session = $request->getSession()? $request->getSession()->all() : null;
        $data = $request->all();
        
        $bitacora = new BitacoraAdmin;
        $bitacora->sesion     = json_encode($session);
        $bitacora->ip         = $request->getClientIp();
        $bitacora->url        = $request->url();
        $bitacora->path       = $request->path();
        $bitacora->metodo     = $request->method();
        $bitacora->data       = json_encode($data);
        $bitacora->user_id    = $user->id??null;
        $bitacora->usuario    = $user->name??null;
        $bitacora->accion     = $action; //La accion se envia en el controlador
        $bitacora->created_at = carbon::now();
        $bitacora->save();
    }

    public static function cliente(Request $request, string $action) : void
    {
        $user = Auth::user();
        $user_id = $user->id?? null;
        $session = $request->getSession()? $request->getSession()->all() : null;
        $data = $request->all();
        
        $bitacora = new BitacoraCliente;
        $bitacora->sesion     = json_encode($session);
        $bitacora->ip         = $request->getClientIp();
        $bitacora->url        = $request->url();
        $bitacora->path       = $request->path();
        $bitacora->metodo     = $request->method();
        $bitacora->data       = json_encode($data);
        $bitacora->user_id    = $user->id??null;
        $bitacora->usuario    = $user->name??null;
        $bitacora->accion     = $action; //La accion se envia en el controlador
        $bitacora->created_at = carbon::now();
        $bitacora->save();
    }
}
