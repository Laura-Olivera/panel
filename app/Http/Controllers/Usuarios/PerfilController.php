<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\Admin\EmpleadoContacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Bitacora;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function empleadoPerfil()
    {
        $user = Auth::user();
        $empleado = $user->empleado;
        $contacto = EmpleadoContacto::where('empleado_id', '=', $empleado->id)->get();
        return view('admin.usuarios.usuario_perfil', compact('user', 'empleado', 'contacto'));
    }

    public function crearContacto()
    {
        return view('admin.usuarios.modal_crear_contacto');
    }

    public function storeContacto(Request $request)
    {
        try {
            $empleado = Auth::user();
            $id_empleado = $empleado->id;
            DB::beginTransaction();
            $contacto = EmpleadoContacto::create([
                'empleado_id' => $id_empleado,
                'nombre' => $request->nombre,
                'telefono' => $request->telefono,
                'direccion' => $request->direccion
            ]);
            DB::commit();
            $data = reuqest();
            $accion = 'El usuario '.$empleado->clave_empleado.' añadio nuevo contacto';
            Bitacora::admin($data, $accion);
            $response = ['success' => true, 'message' => 'El contacto se agrego correctamente'];
        } catch (\Throwable $th) {
            DB::rollback();
            \Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            $response = ['success' => false, 'message' => 'Error al registrar nuevo contacto.'];
        }
        return $response;
    }

    public function editContacto($id)
    {
        $empleado = Auth::user();
        $id_empleado = $empleado->id;
        $contacto = EmpleadoContacto::where('empleado_id', '=',$id_empleado)->get();
        return view('admin.usuarios.modal_editar_contacto');
    }

}
