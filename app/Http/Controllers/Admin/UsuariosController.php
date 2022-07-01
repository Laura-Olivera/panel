<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\Catalogos\Area;
use App\Helpers\Bitacora;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class UsuariosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.usuarios.usuarios');
    }

    public function getDataUsuarios()
    {
        $usuarios = User::all();
        return DataTables::of($usuarios)->toJson();
    }


    public function create()
    {
        $roles = DB::table('roles')->get();
        $areas = Area::where('estatus', '=', true)->get();
        return view('admin.usuarios.modal_crear_usuario',compact('roles', 'areas'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = User::create([
                'nombre' => $request->nombre,
                'primer_apellido' => $request->primer,
                'segundo_apellido' => $request->segundo,
                'curp' => $request->curp,
                'rfc' => $request->rfc,
                'cve_usuario' => '',
                'telefono' => $request->telefono,
                'area' => $request->area,
                'usuario' => $request->usuario,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'cambiar_password' => true,
                'estatus' => true,
                'intentos' => 0
            ]);            
            DB::commit();

            $rol = DB::table('roles')->where('id', '=', $request->perfil)->first();
            $user->assignRole($rol->name);

            $data = request();
            $data['password'] = 'xxxxxxxx';
            $accion = 'Registro nuevo usuario';
            Bitacora::usuarios($data, $accion);
            $response =['success' => true, 'message' => 'El usuario se registro correctamente.'];
        } catch (\Throwable $th) {
            DB::rollback();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al crear proveedor', 'warning');
            $response = ['success' => false, 'message' => 'Error al crear un nuevo usuario'];
        }

        return $response;
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $roles = DB::table('roles')->where(function($query){
            $query->where('name', '!=', 'Cliente');
        })->get();
        $usuario = User::findOrFail($id);
        $perfil = DB::table('model_has_roles')->select('role_id')->where('model_id', '=', $usuario->id)->first();
        $areas = Area::where('estatus', '=', true)->get();
        return view('admin.usuarios.modal_editar_usuario')
            ->with(compact('usuario'))
            ->with(compact('roles'))
            ->with(compact('perfil'))
            ->with(compact('areas'));
    }

    public function update(Request $request)
    {
        try {
            $usuario = User::findOrFail($request->id_usuario);
            
            DB::beginTransaction();
            $usuario->nombre = strtoupper($request->nombre);
            $usuario->primer_apellido = strtoupper($request->primer);
            $usuario->segundo_apellido = strtoupper($request->segundo);
            $usuario->curp = strtoupper($request->curp);
            $usuario->rfc = strtoupper($request->rfc);
            $usuario->telefono = $request->telefono;
            $usuario->usuario = strtolower($request->usuario);
            $usuario->area = $request->area;
            $usuario->email = $request->email;
            if($request->password){
                $pass = Hash::make($request->password);
                $usuario->password = $pass;
                $usuario->cambiar_password = true;
            }
            $usuario->estatus = $request->estatus;
            $usuario->updated_at = Carbon::now();
            $usuario->save();
            DB::commit();

            $userRole = DB::table('model_has_roles')->where('model_id', '=', $usuario->id)->first();
            $anterior = $userRole->role_id;
            if($anterior <> $request->perfil){
                DB::table('model_has_roles')->where('role_id','=',$anterior)->where('model_id', '=', $usuario->id)
                        ->update(['role_id' => $request->perfil]);
                
                $datos = request();
                $datos['password'] = 'xxxxxxxx';
                $accion = 'Cambio de perfil';
                Bitacora::usuarios($datos, $accion);
            }
            $datos = request();
            $datos['password'] = 'xxxxxxxx';
            $accion = 'Actualizacion de usuario';
            Bitacora::usuarios($datos, $accion);

            $response = ['success' => true, 'message' => 'El usuario se actualizó correctamente'];
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al actualizar usuario', 'warning');
            $response = ['success' => false, 'message' => 'Error al actualizar usuario'];
        }
        return $response;
    }

    public function viewUsuario($id)
    {
        $usuario = User::findOrFail($id);
        
        $modHasRol = DB::table('model_has_roles')->select('role_id')->where('model_id', '=', $usuario->id)->first();
        $perfil = DB::table('roles')->where('id', '=', $modHasRol->role_id)->first();

        return view('admin.usuarios.detalle_usuario',compact('usuario', 'perfil'));
    }

    public function user_name(Request $request){
        try {
            $nombre = explode(' ', $request->nombre);
            $pApellido = explode(' ', $request->primer);
            $sApellido = explode(' ', $request->segundo);
            $n_array = [];
            $primer = [];
            $segundo = [];
            $reservar = ['la', 'el', 'de', 'del', 'y'];

            for ($i = 0; $i<count($nombre); $i++){
                if(!in_array($nombre[$i], $reservar)){
                    array_push($n_array, $nombre[$i]);
                }
            }
            for ($i = 0; $i<count($pApellido); $i++){
                if(!in_array($pApellido[$i], $reservar)){
                    array_push($primer, $pApellido[$i]);
                }
            }
            for ($i = 0; $i<count($sApellido); $i++){
                if(!in_array($sApellido[$i], $reservar)){
                    array_push($segundo, $sApellido[$i]);
                }
            }
            $user = substr($n_array[0],0,1);
            $user .= $pApellido[0];
            $existe = DB::table('users')->where('name', '=', $user)->exists();
            if ($existe) {
                $user = null;
                $user = substr($n_array[0],0,1);
                $user .= $pApellido[0];
                $user .= substr($sApellido[0],0,1);

                $existe = DB::table('users')->where('name', '=', $user)->exists();
                if ($existe) {
                    $user = null;
                    $user = substr($n_array[0],0,1);
                    $user .= $sApellido[0];

                    $existe = DB::table('users')->where('name', '=', $user)->exists();
                    if ($existe) {
                        $user = null;
                        $user = substr($n_array[0],0,1);
                        $user .= substr($pApellido[0],0,1);                        
                        $user .= $sApellido[0];

                        $existe = DB::table('users')->where('name', '=', $user)->exists();
                        if ($existe) {
                            $user = null;
                        }
                    }
                }
            }

            return $reponse = ['success' => true, 'data' => strtolower($user)];
        } catch (\Throwable $th) {
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            return $reponse = ['success' => false, 'data' => null];
        }
    }

    public function generarClave($perfil, $empleado){
        $reservar = ['la', 'el', 'de', 'del', 'y'];
        $perfil_array = explode(' ', $perfil);
        $n_array = [];
        $prefijo_perfil = null;
        for ($i=0; $i < count($perfil_array); $i++) { 
            if(!in_array($perfil_array[$i], $reservar)){
                array_push($n_array, $perfil_array[$i]);
            }
        }
        if(count($n_array) < 2){
            $prefijo_perfil = substr($n_array[0], 0, 2);
        }else{
            for ($i=0; $i < count($n_array); $i++) { 
                $prefijo_perfil .= substr($n_array[$i], 0, 1);
            }
        }       
        $random_num = mt_rand(10, 99);
        $char = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $strlen = strlen($prefijo_perfil.$empleado.$random_num);
        $random_str = substr($char, 0, 10 - $strlen);
        $clave = strtoupper($prefijo_perfil.$empleado.$random_num.$random_str);
        return $clave;
    }
}
