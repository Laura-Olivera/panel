<?php

namespace App\Http\Controllers\Inventario;

use App\Helpers\Bitacora;
use App\Http\Controllers\Controller;
use App\Models\Inventario\Anexo;
use App\Models\Inventario\Entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AnexosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $entrada = Entrada::where('id', '=', $request->cve_entrada)->first();
        return view('inventario.entradas.models.modal_add_anexo', compact('entrada'));
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
            $user = Auth::user()->usuario;
            $entrada = Entrada::where('id', '=', $request->entrada_id)->first();
            $anexo = Anexo::select('consecutivo')->where('entrada_id', '=', $request->entrada_id)->orderBy('consecutivo', 'DESC')->first();
            $consecutivo = ($anexo) ? $anexo->consecutivo + 1 : 1;
            $cve_anexo = $entrada->cve_entrada.'-'.$consecutivo;
            $year = $entrada->anio;
            if($request->hasFile('fac_path')){
                $disk = Storage::disk('files_upload');
                $name = $cve_anexo.'.pdf';
                $path = 'anexos/'. $year. '/' . $name;
                $disk->put($path, file_get_contents($request->file('fac_path')), 'public');
                $db_path = Storage::disk('files_upload')->url('anexos/'.$year);
            }
            DB::beginTransaction();
            $nuevoAnexo = Anexo::create([
                "consecutivo" => $consecutivo,
                "entrada_id" => $entrada->id,
                "fac_forma_pago" => $request->fac_forma_pago,
                "fac_parcialidad" => $request->fac_parcialidad,
                "fac_saldo_anterior" => $request->fac_saldo_anterior,
                "fac_saldo_insoluto" => $request->fac_saldo_insoluto,
                "fac_total_letra" => $request->fac_total_letra,
                "fac_fecha_emision" => $request->fac_fecha_emision,
                "fac_fecha_operacion" => $request->fac_fecha_operacion,
                "fac_path" => $db_path,
                "fac_notas" => $request->fac_notas,
                "anexo_notas" => $request->anexo_notas,
                "estatus" => true,
                "created_user" => $user,
                "updated_user" => "",
                "cve_anexo" => $cve_anexo,
                "fac_total" => $request->fac_total
            ]);
            DB::commit();
            $data = request();
            $accion = 'Registro nuevo anexo';
            Bitacora::usuarios($data, $accion);
            $response = ['success' => true, 'message' => 'Anexo registrado correctamente.'];
        } catch (\Throwable $th) {
            DB::rollback();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al crear anexo', 'warning');
            $response = ['success' => false, 'message' => 'Error al registrar anexo.'];
        }
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anexo = Anexo::where('id', '=', $id)->where('estatus', '=', true)->first();
        return view('inventario.entradas.models.modal_edit_anexo', compact('anexo'));
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
            $user = Auth::user()->usuario;
            $anexo = Anexo::findOrFail($request->id);
            $entrada = Entrada::findOrFail($anexo->entrada_id);
            $year = $entrada->anio;
            $existeArchivo = false;

            if($request->hasFile('fac_path')){
                $factura = $request->file('fac_path');
                $extension = $factura->getClientOriginalExtension();

                $fac_name = "{$anexo->cve_anexo}.{$extension}";

                $disk = Storage::disk('files_upload');                
                $path = 'anexos/'. $year. '/';
                $db_path = Storage::disk('files_upload')->url($path);

                if(is_file($db_path.$fac_name)){
                    $respaldo = "{$anexo->cve_anexo}_".date('Ymd_His').".{$extension}";
                    $disk->move( $path.$fac_name, "eliminados/{$path}{$respaldo}" );
                }

                $disk->put($path.$fac_name, file_get_contents($request->file('fac_path')), 'public');    
                $existeArchivo = true;            
            }

            DB::beginTransaction();
            $anexo->fac_forma_pago = $request->fac_forma_pago;
            $anexo->fac_parcialidad = $request->fac_parcialidad;
            $anexo->fac_saldo_anterior = $request->fac_saldo_anterior;
            $anexo->fac_saldo_insoluto = $request->fac_saldo_insoluto;
            $anexo->fac_total_letra = $request->fac_total_letra;
            $anexo->fac_fecha_emision = $request->fac_fecha_emision;
            $anexo->fac_fecha_operacion = $request->fac_fecha_operacion;
            if($existeArchivo){
                $anexo->fac_path = $db_path;
                $anexo->fac_notas = $request->fac_notas;
            }
            $anexo->anexo_notas = $request->anexo_notas;
            $anexo->updated_user = $user;
            $anexo->fac_total = $request->fac_total;
            $anexo->save();
            DB::commit();
            
            $data = request();
            $accion = 'Actualizacion de anexo';
            Bitacora::usuarios($data, $accion);
            $response = ['success' => true, 'message' => 'Anexo actualizado correctamente.'];

        } catch (\Throwable $th) {
       
            DB::rollback();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al actualizar anexo', 'warning');
            $response = ['success' => false, 'message' => 'Error al actualizar la anexo.'];
       
        }

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
