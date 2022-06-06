<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\Admin\Empleado;
use App\Helpers\Bitacora;
use App\Models\Admin\EmpleadoContacto;
use App\Models\Admin\Tarea;
use Illuminate\Support\Carbon;

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
        $empleados = Empleado::select('empleados.*', 'users.email', 'users.estatus')
            ->addSelect(DB::raw('(select name as perfil from roles 
                where roles.id = (select role_id from model_has_roles where model_has_roles.model_id = empleados.user_id))'))
            ->join('users', 'empleados.user_id', '=', 'users.id')->get();
        return DataTables::of($empleados)->toJson();
    }


    public function create()
    {
        $roles = DB::table('roles')->where(function($query){
            $query->where('name', '!=', 'Cliente');
        })->get();
        $usuario = Auth::user();
        $tipo = $usuario->empleado->clave_empleado;
        return view('admin.usuarios.modal_crear_usuario',compact('roles', 'tipo'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->nombre,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'estatus' => 1
            ]);
            DB::commit();

            $rol = DB::table('roles')->where('id', '=', $request->perfil)->first();
            $user->assignRole($rol->name);

            $registro = Auth::user();

            DB::beginTransaction();
            $direccion = $request->direccion;
            $clave = $this->generarClave($rol->name, $user->id);
            
            $empleado = Empleado::create([
                'user_id' => $user->id,
                'nombre' => strtoupper($request->nombre),
                'primer_apellido' => strtoupper($request->primer),
                'segundo_apellido' => strtoupper($request->segundo),
                'created_user_id' => $registro->id,
                'updated_user_id' => $registro->id,
                'direccion' => strtoupper($direccion),
                'telefono' => $request->telefono,
                'clave_empleado' => $clave,
            ]);
            DB::commit();

            $datos = request();
            $datos['password'] = 'xxxxxxxx';
            $accion = 'Crear nuevo usuario '.$empleado->clave_empleado.' '.$empleado->nombre.' '.$empleado->primer_apellido.' '.$empleado->segundo_apellido;
            Bitacora::admin($datos, $accion);

            $response =['success' => true, 'message' => 'El usuario se registro correctamente'];
        } catch (\Throwable $th) {
            DB::rollback();
            \Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
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
        $usuario = DB::table('empleados')
                    ->join('users', 'empleados.user_id', '=', 'users.id')
                    ->select('empleados.*','users.name', 'users.email','users.estatus', 'users.password')
                    ->where('empleados.id', '=', $id)
                    ->first();
        $direccion = explode('|', $usuario->direccion);
        $perfil = DB::table('model_has_roles')->select('role_id')->where('model_id', '=', $usuario->user_id)->first();
        return view('admin.usuarios.modal_editar_usuario')
            ->with(compact('usuario'))
            ->with(compact('direccion'))
            ->with(compact('roles'))
            ->with(compact('perfil'));
    }

    public function update(Request $request)
    {
        try {
            $usuario = Empleado::findOrFail($request->id_usuario);
            $getId = Auth::user();
            $registro = $getId->id;
            
            DB::beginTransaction();
            $usuario->nombre = strtoupper($request->nombre);
            $usuario->primer_apellido = strtoupper($request->primer);
            $usuario->segundo_apellido = strtoupper($request->segundo);
            $usuario->telefono = $request->telefono;
            $usuario->direccion = strtoupper($request->direccion);
            $usuario->updated_user_id = $registro;
            $usuario->save();
            DB::commit();

            DB::beginTransaction();
            $user = User::findOrFail($usuario->user_id);
            $user->name = strtolower($request->nombre);
            $user->email = $request->email;
            if($request->password){
                $pass = Hash::make($request->password);
                $user->password = $pass;
            }
            $user->estatus = $request->estatus;
            $user->save();
            DB::commit();

            $userRole = DB::table('model_has_roles')->where('model_id', '=', $user->id)->first();
            $anterior = $userRole->role_id;
            if($anterior <> $request->perfil){
                DB::table('model_has_roles')->where('role_id','=',$anterior)->where('model_id', '=', $user->id)
                        ->update(['role_id' => $request->perfil]);
                
                $datos = request();
                $datos['password'] = 'xxxxxxxx';
                $accion = 'Actulizar perfil usuario '.$usuario->clave_empleado.' '.$usuario->nombre.' '.$usuario->primer_apellido.' '.$usuario->segundo_apellido;
                Bitacora::admin($datos, $accion);
            }
            $datos = request();
            $datos['password'] = 'xxxxxxxx';
            $accion = $usuario->clave_empleado.' actualizo los datos del usuario '.$usuario->nombre.' '.$usuario->primer_apellido.' '.$usuario->segundo_apellido;
            Bitacora::admin($datos, $accion);

            $response = ['success' => true, 'message' => 'Los datos se actualizarón correctamente'];
        } catch (\Throwable $th) {
            DB::rollBack();
            \Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            $response = ['success' => false, 'message' => 'Error al actualizar los datos'];
        }
        return $response;
    }

    public function viewUsuario($id)
    {
        $usuario = DB::table('empleados')
                    ->join('users', 'empleados.user_id', '=', 'users.id')
                    ->select('empleados.*','users.name', 'users.email','users.estatus', 'users.password')
                    ->where('empleados.id', '=', $id)
                    ->first();
        $direccion = explode('|', $usuario->direccion);
        $modHasRol = DB::table('model_has_roles')->select('role_id')->where('model_id', '=', $usuario->user_id)->first();
        $perfil = DB::table('roles')->where('id', '=', $modHasRol->role_id)->first();
        $ultimaAccion = DB::table('bitacora')->where('user_id', '=', $usuario->user_id)->orderByDesc('created_at')->limit(5)->get();
        foreach ($ultimaAccion as $accion) {
            $accion->created_at = Carbon::parse($accion->created_at)->format('Y-m-d H:i');
        }
        $tPendientes = DB::table('tareas')->where('estatus', '<>', 4)->get();
        $tFinalizadas = DB::table('tareas')->where('estatus', '=', 4)->get();
        $empleadoTarea = DB::table('empleado_tarea')->where('empleado_id', '=', $usuario->id)->get();
        foreach ($tPendientes as $tarea) {
            $tarea->created_at = Carbon::parse($tarea->created_at)->diffForHumans();
        }
        foreach ($tFinalizadas as $tarea) {
            $tarea->created_at = Carbon::parse($tarea->created_at)->diffForHumans();
        }

        $contactos = EmpleadoContacto::where('empleado_id', '=', $usuario->id)->get();
        return view('admin.usuarios.detalle_usuario',compact('usuario', 'perfil', 'direccion', 'ultimaAccion', 'tPendientes', 'tFinalizadas', 'empleadoTarea', 'contactos'));
    }

    public function codigo_postal($codigo)
    {
        $data = HTTP::get('http://localhost:8000/api/codigo_postal/'.$codigo);
        $datos = $data;
        return $datos;
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
