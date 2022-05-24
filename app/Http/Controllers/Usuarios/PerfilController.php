<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin\EmpleadoContacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Bitacora;
use App\Models\Admin\Tarea;
use Carbon\Carbon;

class PerfilController extends Controller
{
    public function tareas()
    {
        
    }

    public function empleadoPerfil()
    {
        $user = session('empleado');
        $contactos = EmpleadoContacto::where('empleado_id', '=', $user->id)->get();
        $tareas = DB::table('tareas')->orderByDesc('created_at')->get();
        $tareaEmpleado = DB::table('empleado_tarea')->select('tarea_id')->where('empleado_id', '=', $user->id)->get();
        foreach ($tareas as $tarea) {
            $tarea->created_at = Carbon::parse($tarea->created_at)->diffForHumans();
        }
        return view('admin.perfil.usuario_perfil', compact('contactos', 'tareas', 'tareaEmpleado'));
    }

    public function crearContacto()
    {
        return view('admin.perfil.modal_crear_contacto');
    }

    public function storeContacto(Request $request)
    {
        try {
            $empleado = session('empleado');
            $id_empleado = $empleado->id;
            DB::beginTransaction();
            $contacto = EmpleadoContacto::create([
                'empleado_id' => $id_empleado,
                'nombre' => $request->nombre,
                'telefono' => $request->telefono,
                'direccion' => $request->direccion
            ]);
            DB::commit();
            $data = request();
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
        $empleado = session('empleado');
        $id_empleado = $empleado->id;
        $contacto = EmpleadoContacto::where('empleado_id', '=',$id_empleado)->where('id','=',$id)->first();
        return view('admin.perfil.modal_editar_contacto',compact('contacto'));
    }

    public function updateContacto(Request $request)
    {
        try {
            $contacto = EmpleadoContacto::findOrFail($request->id);
            DB::beginTransaction();
            $contacto->nombre = $request->nombre;
            $contacto->telefono = $request->telefono;
            $contacto->direccion = $request->direccion;
            $contacto->save();
            DB::commit();
            $response = ['success' => true, 'message' => 'El contacto se actualizo correctamente.'];

        } catch (\Throwable $th) {
            DB::rollback();
            \Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            $response = ['success' => false, 'message' => 'Error al actualizar el contacto.'];
        }
        return $response;
    }

    public function deleteContacto(Request $request)
    {
        try {
            $empleado = session('empleado');
            $id_empleado = $empleado->id;
            DB::beginTransaction();
            $deleteContacto = DB::table('empleado_contacto')->where('empleado_id', '=', $id_empleado)->where('id', '=', $request->id)->delete();
            DB::commit();
            $response = ['success' => true, 'message' => 'El contacto se elimino correctamente.'];
        } catch (\Throwable $th) {
            DB::rollback();
            \Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            $response = ['success' => false, 'message' => 'Error al eliminar el contacto.'];
        }
        return $response;
    }

    public function passwordView()
    {
        return view('admin.perfil.modal_editar_password');
    }

    public function passwordReset(Request $request)
    {
        try {
            $id = Auth::user()->id;
            $user = User::findOrFail($id);
            $empleado = session('empleado')->clave_empleado;
            dd($request->password);
            DB::beginTransaction();            
            $user->password = Hash::make($request->password);
            $user->save();
            DB::commit();
            $data = request();
            $data['password'] = 'xxxxxxxx';
            $accion = 'El usuario '.$empleado.' cambio su contraseña';
            Bitacora::admin($data, $accion);
            $response = ['success' => true, 'message' => 'Se actualizo la contraseña.'];
        } catch (\Throwable $th) {
            DB::rollback();
            \Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            $response = ['success' => false, 'message' => 'Error al actualizar la contraseña.'];
        }
        return $response;
    }

}
