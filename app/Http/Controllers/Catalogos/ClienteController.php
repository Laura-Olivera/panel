<?php

namespace App\Http\Controllers\Catalogos;

use App\Helpers\Bitacora;
use App\Http\Controllers\Controller;
use App\Models\Catalogos\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogos.clientes.listar_clientes');
    }

    /* 
    *
    *
    *
    +
    */
    public function listar_clientes()
    {
        $clientes = Clientes::all();
        return DataTables::of($clientes)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.clientes.modal_create_cliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $cliente = Clientes::create([
                "nombre" => $request->nombre,
                "rfc" => $request->rfc,
                "direccion" => $request->direccion,
                "email" => $request->email,
                "telefono" => $request->telefono,
                "estatus" => $request->estatus,
                "created_user_id" => Auth::user()->id,
            ]);
            DB::commit();
            $data = request();
            $accion = 'Registró nuevo cliente';
            Bitacora::usuarios($data, $accion);
            $response = ['success' => true, 'message' => 'El cliente se registro correctamente.'];

        } catch (\Throwable $th) {
            DB::rollback();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al crear cliente', 'warning');
            $response = ['success' => false, 'message' => 'Error al registrar cliente.'];
        }
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Clientes::findOrFail($id);
        return view('catalogos.clientes.modal_edit_cliente', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $cliente = Clientes::findOrFail($request->id);
            DB::beginTransaction();
            $cliente->nombre = $request->nombre;
            $cliente->rfc = $request->rfc;
            $cliente->direccion = $request->direccion;
            $cliente->email = $request->email;
            $cliente->telefono = $request->telefono;
            $cliente->estatus = $request->estatus;
            $cliente->updated_user_id = Auth::user()->id;
            $cliente->save();
            DB::commit();
            $data = request();
            $accion = 'Actualizar cliente';
            Bitacora::usuarios($data, $accion);
            $response = ['success' => true, 'message' => 'El cliente se actualizo correctamente.'];
        } catch (\Throwable $th) {
            DB::rollback();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al actualizar cliente', 'warning');
            $response = ['success' => false, 'message' => 'Error al actualizar cliente.'];
        }

        return $response;
    }

}
