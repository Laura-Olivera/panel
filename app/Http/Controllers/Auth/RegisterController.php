<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Admin\Cliente;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use App\Helpers\Bitacora;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        echo $data;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        $user_id = (\Auth::user()) ? \Auth::user()->id : null;
        $name = strtolower($request->input('usuario'));
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $telefono = $request->input('telefono');
        $existe = User::where('email', '=', $email)->where('estatus', 1)->exists();
        if(!$existe){

            try {
                DB::beginTransaction();
                $usuario = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'estatus' => 1,
                ]);
                DB::commit();
                $usuario->assignRole('Cliente');
                DB::beginTransaction();
                $clave = $this->generarCLave($usuario->id);
                $cliente = Cliente::create([
                    'user_id' => $usuario->id,
                    'nombre_completo' => $name,
                    'telefono' => $telefono,
                    'clave_cliente' => $clave,
                    'slug' => $clave,
                ]);
                DB::commit();
                $data = request();
                $data['password'] = 'xxxxxxxx';
                $accion = 'Registro nuevo cliente '.$clave.' '.$cliente->nombre_completo;
                Bitacora::cliente($data, $accion);
                $response = ['success' => true];
            } catch (\Throwable $th) {
                DB::rollback();
                \Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
                $response = ['success' => false];
            }
        }else{
            $response = ['success' => false];
        }       
        return $response; 
    }

    public function generarCLave($usuario)
    {
        $random_num = mt_rand(10, 99);
        $char = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $strlen = strlen('CG'.$usuario.$random_num);
        $random_str = substr($char, 0, 15 - $strlen);
        $clave = strtoupper('cg'.$usuario.$random_num.$random_str);
        return $clave;
    }
}
