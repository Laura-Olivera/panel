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
                Bitacora::admin($datos, 'inicio de sesion');
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
