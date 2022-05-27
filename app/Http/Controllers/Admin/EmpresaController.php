<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Bitacora;
use App\Http\Controllers\Controller;
use App\Models\Admin\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresa = Empresa::all();
        return view('admin.empresa.empresa', compact('empresa'));
    }

    public function edit($id)
    {
        $empresa = Empresa::findOrfail($id);
        return view('admin.empresa.modal_editar_empresa', compact('empresa'));
    }

    public function update(Request $request)
    {
        try {
            $empresa = Empresa::findOrFail($request->id);
            $user_id = Auth::user()->id;
            $usuario = session('empleado')->clave_empleado;
            DB::beginTransaction();
            $empresa->nombre = $request->nombre;
            $empresa->email = $request->email;
            $empresa->telefono = $request->telefono;
            $empresa->direccion = $request->direccion;
            $empresa->logo = $request->logo;
            $empresa->color = $request->color;
            $empresa->updated_user_id = $user_id;
            DB::commit();
            $accion = 'El usuario '.$usuario.' actualizo los datos de la empresa';
            $datos = request();
            Bitacora::admin($datos, $accion);
            $response = ['success' => true, 'message' => 'Los datos se actualizaron correctamente.'];
        } catch (\Throwable $th) {
            DB::rollback();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            $response = ['success' => false, 'message' => 'Error al registrar la tarea.'];
        }

        return $response;
    }


}
