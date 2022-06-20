<?php

namespace App\Http\Controllers\Catalogos;

use App\Helpers\Bitacora;
use App\Http\Controllers\Controller;
use App\Models\Catalogos\Proveedor;
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
        $proveedores = Proveedor::all();
        return DataTables::of($proveedores)->toJson();
    }

    public function create()
    {
        return view('catalogos.proveedores.modal_crear_proveedor');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $proveedor = Proveedor::create([
                'nombre' => $request->nombre,
                'cve_prov' => $request->clave,
                'telefono' => $request->telefono,
                'extension' => $request->extension,
                'direccion' => $request->direccion,
                'email' => $request->email,
                'estatus' => $request->estatus,
                'created_user_id' => Auth::user()->id
            ]);
            DB::commit();
            $data = request();
            $accion = 'Registró nuevo proveedor';
            Bitacora::usuarios($data, $accion);
            $response = ['success' => true, 'message' => 'El proveedor se registro correctamente.'];

        } catch (\Throwable $th) {
            DB::rollback();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al crear proveedor', 'warning');
            $response = ['success' => false, 'message' => 'Error al registrar proveedor.'];
        }
        return $response;
    }

    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('catalogos.proveedores.modal_editar_proveedor', compact('proveedor'));
    }

    public function update(Request $request)
    {
        try {
            $proveedor = Proveedor::findOrFail($request->id);
            DB::beginTransaction();
            $proveedor->nombre = $request->nombre;
            $proveedor->cve_prov = $request->clave;
            $proveedor->telefono = $request->telefono;
            $proveedor->extension = $request->extension;
            $proveedor->direccion = $request->direccion;
            $proveedor->email = $request->email;
            $proveedor->estatus = $request->estatus;
            $proveedor->updated_user_id = Auth::user()->id;
            $proveedor->save();
            DB::commit();
            $data = request();
            $accion = "Actualizacion de proveedor";
            Bitacora::usuarios($data, $accion);
            $response = ['success' => true, 'message' => 'El proveedor se actualizo correctamente.'];
        } catch (\Throwable $th) {
            DB::rollback();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al actualizar proveedor', 'warning');
            $response = ['success' => false, 'message' => 'Error al actualizar proveedor.'];
        }
        return $response;
    }
}
