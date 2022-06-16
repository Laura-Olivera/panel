<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Bitacora;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

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
        try {
            $user = $request->input('username');
            $remember = ($request->input('remember')) ? true : false;        
            $existe = User::where('usuario', '=', $user)->where('estatus', '=', true)->exists();
            if($existe){
                $validar = Auth::attempt(['usuario' => $user, 'password' => $request->input('password'), 'estatus' => true], $remember);
                if($validar == true){
                    $usuario = Auth::user();
                    session(['usuario' => $usuario]);
                    $datos = request();
                    $datos['password'] = 'xxxxxxxx';
                    $accion = 'login';
                    Bitacora::usersMonitoring($datos, $accion);
                    $response = ['success' => true];
                }else{
                    $response = ['success' => false];
                }
            }else{
                $response = ['success' => false];
            }

            return $response;
        } catch (\Throwable $th) {
            Bitacora::log('App\Http\Controllers\Auth','LoginController::login', $th->getLine(), $th->getMessage(), '', 'warning');
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            $response = ['success' => false];
            return $response;
        }
    }

    public function logout()
    {
        $datos = request();
        $accion = 'logout';
        Bitacora::usersMonitoring($datos, $accion);
        session()->flush();
        return redirect('/');
    }
}
