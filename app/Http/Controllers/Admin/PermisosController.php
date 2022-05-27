<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\Bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class PermisosController extends Controller
{
    public function index()
    {
        return view('admin.permisos.listar_permisos');
    }

    public function lista_permisos()
    {
        $permisos = Permission::where('name', '!=', 'PermisosCliente')->get();
        return DataTables::of($permisos)->toJson();
    }

    public function create()
    {
        return view('admin.permisos.modal_crear_permiso');
    }

    public function store(Request $request)
    {
        try {
            $existe = Permission::where('name', '=', $request->name)->exists();
            if(!$existe){
                DB::beginTransaction();
                $permiso = Permission::create([
                    'name' => $request->name,
                    'guard_name' => 'web',
                    'descrip' => $request->descrip
                ]);
                DB::commit();
                $accion = 'Registro nuevo permiso '.$permiso->name;
                Bitacora::admin(request(), $accion);
                $response = ['success' => true, 'message' => 'El permiso se registro correctamente.'];
            }else{
                $response = ['success' => false, 'message' => 'El permiso ya existe.'];
            }
        } catch (\Throwable $th) {
            DB::rollback();
            \Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            $response = ['success' => false, 'message' => 'Error al crear un nuevo permiso.'];
        }
        return $response;
    }

    public function edit(Request $request)
    {
        $permiso = Permission::findOrFail($request->id);
        return view('admin.permisos.modal_editar_permiso', compact('permiso'));
    }

    public function update(Request $request)
    {
        try {
            $getData = $request->all();
            $permiso = Permission::findOrFail($request->id);
            $permiso->fill($getData)->save();
            $accion = 'Actualizar permiso '.$permiso->name;
            Bitacora::admin(request(), $accion);
            $response = ['success' => true, 'message' => 'El permiso se actualizo correctamente.'];
        } catch (\Throwable $th) {
            DB::rollback();
            \Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            $response = ['success' => false, 'message' => 'Error al actualizar el permiso.'];
        }
        return $response;
    }
}
