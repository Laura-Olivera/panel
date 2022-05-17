<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Bitacora;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {}

    public function login(Request $request)
    {
        $user = $request->input('username');
        $remember = ($request->input('remember')) ? true : false;        
        $existe = User::where('email', '=', $user)->where('estatus', '=', 1)->exists();
        if($existe){
            $validar = Auth::attempt(['email' => $user, 'password' => $request->input('password'), 'estatus' => 1], $remember);
            if($validar == true){
                $datos = request();
                $datos['password'] = 'xxxxxxxx';
                $usuario = User::where('email', '=', $user)->where('estatus', '=', 1)->first();
                $modHasRol = DB::table('model_has_roles')->where('model_id', '=', $usuario->id)->first();
                $perfil = DB::table('roles')->where('id', '=', $modHasRol->role_id)->first();
                if($perfil->name == 'Cliente'){
                    $cliente = DB::table('clientes')->where('user_id', '=', $usuario->id)->first();
                    $accion = 'Inicio de sesión cliente '.$cliente->clave_cliente;
                    Bitacora::cliente($datos, $accion);
                }else{
                    $empleado = DB::table('empleados')->where('user_id', '=', $usuario->id)->first();
                    $accion = 'Inicio de sesión empleado '.$empleado->clave_empleado;
                    Bitacora::admin($datos, $accion);
                }
                $response = ['success' => true];
            }else{
                $response = ['success' => false];
            }
        }else{
            $response = ['success' => false];
        }

        return $response;
    }
}
