<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Bitacora;
use App\Http\Controllers\Controller;
use App\Models\Admin\Empleado;
use App\Models\Admin\EmpleadoTarea;
use App\Models\Admin\Tarea;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class TareasController extends Controller
{
    public function index()
    {
        $tareas = Tarea::all()->sortByDesc('id');
        foreach ($tareas as $tarea) {
            $tarea->created_at = Carbon::parse($tarea->created_at)->format('Y-m-d');
            if($tarea->updated_at == $tarea->created_at || $tarea->updated_at != $tarea->created_at && $tarea->estatus != 4){
                $tarea->updated_at = null;
            }else{
                $tarea->updated_at = Carbon::parse($tarea->updated_at)->format('Y-m-d H:i');                
            }
        }
        return view('admin.tareas.lista_tareas', compact('tareas'));
    }

    public function create()
    {
        $empleados = Empleado::all();
        return view('admin.tareas.modal_crear_tarea', compact('empleados'));
    }

    public function store(Request $request)
    {
        try {
            $user_id = Auth::user()->id;
            $empleado = session('empleado');
            DB::beginTransaction();
            $tarea = Tarea::create([
                'tarea' => $request->tarea,
                'descripcion' => $request->descripcion,
                'modulo' => $request->modulo,
                'estatus' => $request->estatus,
                'created_user_id' => $user_id,
                'updated_user_id' => $user_id
            ]);
            if($tarea){
                DB::commit();
                $empleadosTarea = $request->empleados;
                foreach($empleadosTarea as $asignadoA) {
                    DB::beginTransaction();
                    $emp_tarea = DB::table('empleado_tarea')->insert([
                        'tarea_id' => $tarea->id,
                        'empleado_id' => $asignadoA
                    ]);
                    DB::commit();
                }                
            }

            $datos = request();
            $accion = 'El usuario '.$empleado->clave_empleado.' creo la tarea '.$tarea->tarea;
            Bitacora::admin($datos, $accion);

            $response = ['success' => true, 'message' => 'La tarea se registro correctamente.'];
        } catch (\Throwable $th) {
            DB::rollback();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            $response = ['success' => false, 'message' => 'Error al registrar la tarea.'];
        }

        return $response;
    }

    public function edit($id)
    {
        $tarea = Tarea::findOrFail($id);
        $empleados = Empleado::all();
        $empleadoTareas = DB::table('empleado_tarea')->select('empleado_id')->where('tarea_id', '=', $id)->get();
        return view('admin.tareas.modal_editar_tarea', compact('tarea', 'empleados', 'empleadoTareas'));
    }

    public function update(Request $request)
    {
        try {   
            $user_id = Auth::user()->id;
            $empleado = session('empleado');
            $tarea = Tarea::findOrFail($request->id);

            DB::beginTransaction();
            $tarea->tarea = $request->tarea;
            $tarea->descripcion = $request->descripcion;
            $tarea->modulo = $request->modulo;
            $tarea->estatus = $request->estatus;
            $tarea->updated_user_id = $user_id;
            $tarea->save();

            if($tarea){
                DB::commit();

                $empleadosTarea = $request->empleados;
                $deleteEmpleadoTarea = DB::table('empleado_tarea')->where('tarea_id', '=', $tarea->id)->delete();
                foreach ($empleadosTarea as $asignadoA) {
                    DB::beginTransaction();
                    $emp_tarea = DB::table('empleado_tarea')->insert([
                        'tarea_id' => $tarea->id,
                        'empleado_id' => $asignadoA
                    ]);
                    DB::commit();
                } 
            }

            $datos = request();
            $accion = 'El usuario '.$empleado->clave_empleado.' actualizo la tarea '.$tarea->tarea;
            Bitacora::admin($datos, $accion);

            $response = ['success' => true, 'message' => 'La tarea se actualizo correctamente.'];

        } catch (\Throwable $th) {
            $response = ['success' => false, 'message' => 'Error al actualizar la tarea.'];
        }

        return $response;
    }

    function getStringFromObject($object, $separador = ",")
    {
        $array = [];

        if( gettype($object)  == 'array' ) {
            $object = (object) $object;
        }

        foreach($object as $row ){
            if( in_array(gettype($row), ['array','object'] )  ) {
                $array[] = getStringFromObject($row, $separador);
            } else {
                $array[] = $row;
            }
        }

        return implode($separador, $array);
    }

}
