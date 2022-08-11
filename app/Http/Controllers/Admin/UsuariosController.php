<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Bitacora;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Catalogos\Area;
use App\Services\Claves;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UsuariosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $class = "usuarios";
        $filename = 'Reporte_Usuarios';
        $plantilla = 'usuarios_import.csv';
        return view('admin.usuarios.usuarios', compact('class', 'filename', 'plantilla'));
    }

    public function getDataUsuarios()
    {
        $usuarios = User::select('users.*', 'areas.nombre as nombre_area')
        ->join('areas', 'users.area', '=', 'areas.cve_area')
        ->get();
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
        $nombre = mb_strtoupper($request->nombre);
        $primer_apellido = mb_strtoupper($request->primer);
        $segundo_apellido = mb_strtoupper($request->segundo);
        $curp = mb_strtoupper($request->curp);
        $rfc = mb_strtoupper($request->rfc);
        $usuario = mb_strtolower($request->usuario);
        $getClave = new Claves;
        $clave = $getClave->generarClave('users', 'cve_usuario');
        try {

            $useremail = User::where('email', '=', $request->email)->exists();
            if ($useremail) {
                $response = ['success' => false, 'message' => 'El correo electronico ya esta registrado.'];
            }
            $username = User::where('usuario', '=', $usuario)->exists();

            if($username){
                $response = ['success' => false, 'message' => 'El nombre de usuario ya existe.'];
            }else{
                DB::beginTransaction();
                $user = User::create([
                    'nombre' => $nombre,
                    'primer_apellido' => $primer_apellido,
                    'segundo_apellido' => $segundo_apellido,
                    'curp' => $curp,
                    'rfc' => $rfc,
                    'cve_usuario' => $clave,
                    'telefono' => $request->telefono,
                    'area' => $request->area,
                    'usuario' => $usuario,
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
                Bitacora::usuarios($data, 'Registro nuevo usuario');
                $response =['success' => true, 'message' => 'El usuario se registro correctamente.'];
            }
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
           $useremail = User::where('email', '=', $request->email)->exists();
           if($useremail){
                $response = ['success' => false, 'message' => 'El correo electronica ya esta registrado'];
           }else{
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
                Bitacora::usuarios($datos, 'Actualizar usuario');

                $response = ['success' => true, 'message' => 'El usuario se actualizó correctamente'];
           }
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
}
