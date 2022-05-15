<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\Admin\Empleado;
use App\Helpers\Bitacora;

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
        $empleados = DB::table('empleados')
            ->join('users', 'empleados.user_id', '=', 'users.id')
            ->select('empleados.*', 'users.email', 'users.estatus')
            ->get();
        return DataTables::of($empleados)->toJson();
    }


    public function create()
    {
        $roles = DB::table('roles')->where(function($query){
            $query->where('name', '!=', 'Cliente');
        })->get();
        return view('admin.usuarios.modal_crear_usuario')->with('roles', $roles);
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
            $empleado = Empleado::create([
                'user_id' => $user->id,
                'nombre' => $request->nombre,
                'primer_apellido' => $request->primer,
                'segundo_apellido' => $request->segundo,
                'created_user_id' => $registro->id,
                'updated_user_id' => $registro->id,
                'direccion' => $direccion,
                'telefono' => $request->telefono,
            ]);
            DB::commit();

            $datos = request();
            $datos['password'] = 'xxxxxxxx';
            Bitacora::admin($datos, 'Crear nuevo usuario');

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
        $roles = DB::table('roles')->get();
        $usuario = DB::table('empleados')
                    ->join('users', 'empleados.user_id', '=', 'users.id')
                    ->select('empleados.*', 'users.id','users.name', 'users.email','users.estatus', 'users.password')
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
            $usuario->nombre = $request->nombre;
            $usuario->primer_apellido = $request->primer;
            $usuario->segundo_apellido = $request->segundo;
            $usuario->telefono = $request->telefono;
            $usuario->direccion = $request->direccion;
            $usuario->updated_user_id = $registro;
            $usuario->save();
            DB::commit();

            DB::beginTransaction();
            $user = User::findOrFail($usuario->user_id);
            $user->name = $request->nombre;
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
            DB::table('model_has_roles')->where('role_id','=',$anterior)->where('model_id', '=', $user->id)
                        ->update(['role_id' => $request->perfil]);
            $datos = request();
            $datos['password'] = 'xxxxxxxx';
            Bitacora::admin($datos, 'actualizar usuario');

            $response = ['success' => true, 'message' => 'Los datos se actualizarón correctamente'];
        } catch (\Throwable $th) {
            DB::rollBack();
            \Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            $response = ['success' => false, 'message' => 'Error al actualizar los datos'];
        }
        return $response;
    }
}
