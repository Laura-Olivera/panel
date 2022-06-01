<?php

namespace App\Http\Controllers\Catalogos;

use App\Helpers\Bitacora;
use App\Http\Controllers\Controller;
use App\Models\Catalogos\Provedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class ProveedoresController extends Controller
{
    public function index()
    {
        return view('catalogos.proveedores.listar_proveedores');
    }

    public function listar_proveedores()
    {
        $proveedores = Provedor::all();
        return DataTables::of($proveedores)->toJson();
    }

    public function create()
    {
        return view('catalogos.proveedores.modal_crear_proveedor');
    }

    public function store(Request $request)
    {
        try {
            $user_id = Auth::user()->id;
            $empleado = session('empleado')->clave_empleado;
            DB::beginTransaction();
            $proveedor = Provedor::create([
                'nombre' => $request->nombre,
                'descrip' => $request->descrip,
                'path' => $request->path,
                'slug' => $request->slug,
                'clave_prov' => $request->clave_prod,
                'estatus' => 1,
                'created_user_id' => $user_id,
                'updated_user_id' => $user_id
            ]);
            DB::commit();
            $data = request();
            $accion = 'Registró al proveedor '.$proveedor->nombre;
            Bitacora::admin($data, $accion);
            $response = ['success' => true, 'message' => 'El proveedor se registro correctamente.'];

        } catch (\Throwable $th) {
            DB::rollback();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            $response = ['success' => false, 'message' => 'Error al registrar proveedor.'];
        }
        return $response;
    }

    public function edit($id)
    {
        $proveedor = Provedor::findOrFail($id);
        return view('catalogos.proveedores.modal_editar_proveedor', compact('proveedor'));
    }

    public function update(Request $request)
    {
        try {
            $user_id = Auth::user()->id;
            $empleado = session('empleado')->clave_empleado;
            $proveedor = Provedor::findOrFail($request->id);
            DB::beginTransaction();
            $proveedor->nombre = $request->nombre;
            $proveedor->descrip = $request->descrip;
            $proveedor->path = $request->path;
            $proveedor->slug = $request->slug;
            $proveedor->estatus = $request->estatus;
            $proveedor->updated_user_id = $user_id;
            DB::commit();
            $data = request();
            $accion = "Actualizó en proveedor ".$request->nombre;
            Bitacora::admin($data, $accion);
            $response = ['success' => true, 'message' => 'El proveedor se actualizo correctamente.'];
        } catch (\Throwable $th) {
            DB::rollback();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            $response = ['success' => false, 'message' => 'Error al actualizar proveedor.'];
        }
        return $response;
    }
}
