<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ModelHasRole;
use App\Models\User;
use App\Models\Admin\Empleado;
use Bitacora;
use Auth;

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
                'name' => $request->input('nombre'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'estatus' => 1
            ]);
            DB::commit();

            $rol = DB::table('roles')->where('id', '=', $request->input('perfil'))->first();
            $user->assingRole($rol->name);

            $registro = Auth::user();

            DB::beginTransaction();
            $direccion = $request->input('calle').' '.$request->input('municipio').' '.$request->input('estado').' '.$request->input('postal');
            $empleado = Empleado::create([
                'user_id' => $user->id,
                'nombre' => $request->input('nombre'),
                'primer_apellido' => $request->input('pApellido'),
                'segundo_apellido' => $request->input('sApellido'),
                'created_user_id' => $registro->id,
                'direccion' => $direccion,
                'telefono' => $request->input('telefono'),
            ]);
            DB::commit();

            $datos = request();
            Bitacora::admin($datos, 'Crear nuevo usuario');

            $response =['success' => true, 'message' => 'El usuario se registro correctamente'];
        } catch (\Throwable $th) {
            DB::rollback();
            \Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            $response = ['success' => false, 'message' => 'Error al crear un nuevo usuario'];
        }
    }
}
