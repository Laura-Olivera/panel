<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\Bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.listar_roles')->with('roles', $roles);
    }

    public function create()
    {
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
                $accion = 'Registro nuevo perfil.';
                Bitacora::usuarios(request(), $accion);
            } catch (\Throwable $th) {
                DB::rollback();
                Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
                Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al crear rol', 'warning');
                $response = ['success' => false, 'message' => 'Error al crear un nuevo perfil'];
            }
        }else{
            $response = ['success' => false, 'message' => 'El perfil ya existe'];
        }

        return $response;
    }

    public function edit($name)
    {
        $permissions = Permission::all();
        $rol = Role::where('name', '=', $name)->first();
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
            $accion = 'Actualizacion de perfil.';
            Bitacora::usuarios(request(), $accion);
            return redirect('admin/perfiles');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al actualizar rol', 'warning');
            return redirect('admin/perfiles');
        }
    }

}
