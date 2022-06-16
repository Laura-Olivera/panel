<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Bitacoras\BitacoraUsuario;
use App\Models\Bitacoras\BitacoraLog;
use App\Models\Bitacoras\UserMonitoring;
use Illuminate\Support\Facades\Auth;

class Bitacora
{
    public static function usuarios(Request $request, string $action) : void
    {
        $user = Auth::user();
        $user_id = $user->id?? null;
        $session = $request->getSession()? $request->getSession()->all() : null;
        $data = $request->all();
        
        $bitacora = new BitacoraUsuario();
        $bitacora->session     = json_encode($session);
        $bitacora->ip         = $request->getClientIp();
        $bitacora->url        = $request->url();
        $bitacora->path       = $request->path();
        $bitacora->metodo     = $request->method();
        $bitacora->data       = json_encode($data);
        $bitacora->user_id    = $user->id??null;
        $bitacora->usuario    = $user->usuario??null;
        $bitacora->accion     = $action; //La accion se envia en el controlador
        $bitacora->created_at = carbon::now();
        $bitacora->save();
    }

    public static function log($class, $file, $line, $message, $description, $tipo) : void
    {
        $bitacora = new BitacoraLog;

        $bitacora->class       = $class;
        $bitacora->file        = $file;
        $bitacora->line        = $line;
        $bitacora->message     = $message;
        $bitacora->description = $description;
        $bitacora->tipo        = $tipo;
        $bitacora->created_at  = carbon::now();
        $bitacora->save();
    }

    public static function usersMonitoring(Request $request, $action) : void
    {
        $user = Auth::user();
        $user_id = $user->id?? null;

        $monitoring = new UserMonitoring;
        $monitoring->ip         = $request->getClientIp();
        $monitoring->user_id    = $user_id;
        $monitoring->usuario    = $user->usuario;
        $monitoring->accion     = $action;
        $monitoring->created_at = carbon::now();
        $monitoring->save();
    }
}
