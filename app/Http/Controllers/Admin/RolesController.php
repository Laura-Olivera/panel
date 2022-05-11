<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\Bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;


class RolesController extends Controller
{
    public function index()
    {
        return view('admin.roles.listar_roles');
    }

    public function listar_roles(){
        $roles = Role::all();
        return DataTables::of($roles)->toJson();
    }

    public function create()
    {
        $permisos = Permission::all();
        return view('admin.roles.modal_crear_perfil');
    }

    public function store(Request $request)
    {
        $existe = Role::where('name', '=', $request->name)->exists();
        if(!$existe){
            try {
                DB::beginTransaction();
                $rol = Role::create([
                    'name' => $request->name,
                    'guard_name' => 'web',
                    'descrip' => $request->descrip
                ]);
                $response = ['success' => true, 'message' => 'El perfil se registro correctamente'];
                DB::commit();
                Bitacora::admin(request(), 'registrar nuevo perfil');
            } catch (\Throwable $th) {
                DB::rollback();
                \Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
                $response = ['success' => false, 'message' => 'Error al crear un nuevo perfil'];
            }
        }else{
            $response = ['success' => false, 'message' => 'El perfil ya existe'];
        }

        return $response;
    }

    public function edit($id)
    {
        $permissions = Permission::all();
        $rol = Role::findOrFail($id);
        return view('admin.roles.editar_perfil', compact('permissions', 'rol'));
    }

    public function update(Request $request, $id)
    {
        try {
            $rol = Role::findOrFail($id);
            $rolData = $request->except(['permissions']);
            $permissions = $request['permissions'];
            $rol->fill($rolData)->save();
            $permisosTabla = Permission::all();
            foreach ($permisosTabla as $permiso) {
                $rol->revokePermissionTo($permiso);
            }
            foreach ($permissions as $permission) {
                $perm = Permission::where('id', '=', $permission)->firstOrFail();
                $rol->givePermissionTo($perm);
            }
            $response = ['success' => true, 'message' => 'Se actualizo el perfil correctamente.'];
        } catch (\Throwable $th) {
            DB::rollback();
            \Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            $response = ['success' => false, 'message' => 'Error al crear actualizar el perfil.'];
        }
        return $response;
    }

}
