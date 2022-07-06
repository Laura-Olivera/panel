<?php

namespace App\Http\Controllers\Inventario;

use App\Helpers\Bitacora;
use App\Http\Controllers\Controller;
use App\Models\Catalogos\Producto;
use App\Models\Catalogos\Proveedor;
use App\Models\Inventario\Entrada;
use App\Models\Inventario\EntradaProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class EntradasController extends Controller
{
    
    public function index()
    {
        return view('inventario.entradas.listar_entradas');
    }

    public function listar_entradas()
    {
        $entradas = DB::table('inventario_entradas')->select('inventario_entradas.*', 'proveedores.nombre as proveedor')
        ->join('proveedores', 'proveedores.id', '=', 'inventario_entradas.proveedor_id')
        ->get();
        return DataTables::of($entradas)->toJson();
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        return view('inventario.entradas.nueva_entrada', compact('proveedores'));
    }

    public function store(Request $request)
    {
        try {
            $user = Auth::user()->id;
            $year = date('Y');
            $consecutivo = DB::table('inventario_entradas')->select('consecutivo')->orderBy('consecutivo', 'desc')->first();
            $conse = ($consecutivo) ? $consecutivo->consecutivo + 1 : 1;
            $folio = $this->folioEntrada($year, $conse, 'ENTRADA');
            if($request->hasFile('fac_path')){
                $disk = Storage::disk('files_upload');
                $fac_name = $folio.'.pdf';
                $path = 'facturas/'. $year. '/' . $fac_name;
                $disk->put($path, file_get_contents($request->file('fac_path')), 'public');
                $db_path = Storage::disk('files_upload')->url('facturas/'.$year);
            }
            DB::beginTransaction();
            $entrada = Entrada::create([
                'cve_entrada' => $folio,
                'proveedor_id' => $request->proveedor,
                'factura' => $request->factura,
                'fac_fecha' => $request->fac_fecha,
                'fac_path' => $db_path,
                'fac_total' => $request->fac_total,
                'fac_notas' => $request->fac_notas,
                'notas' => $request->notas,
                'estatus' => $request->estatus,
                'consecutivo' => $conse,
                'created_user_id' => $user,
            ]);
            DB::commit();
            $data = request();
            $accion = 'Registro nueva entrada';
            Bitacora::usuarios($data, $accion);
            $response = ['success' => true, 'message' => 'Entrada registrada correctamente.', 'entrada' => $folio];
        } catch (\Throwable $th) {
            DB::rollback();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al crear entrada', 'warning');
            $response = ['success' => false, 'message' => 'Error al crear entrada.'];
        }
        return $response;
    }

    public function show($cve_entrada)
    {
        //dd('show entrada');
        $entrada = DB::table('inventario_entradas')->select('inventario_entradas.*', 'proveedores.nombre as proveedor', 'users.usuario as user')
            ->join('proveedores', 'proveedores.id', '=', 'inventario_entradas.proveedor_id')
            ->join('users', 'users.id', '=', 'inventario_entradas.created_user_id')
            ->where('inventario_entradas.cve_entrada', '=', $cve_entrada)
            ->first();
        $entrada->created_at = \Carbon\Carbon::parse($entrada->created_at)->format('Y-m-d');
        return view('inventario.entradas.ver_entrada', compact('entrada'));
    }

    public function buscar_producto($codigo)
    {
        try {
            $producto = Producto::where('codigo', '=', $codigo)->first();
            $response = ['id_prod' => $producto->id, 'descrip_gral' => $producto->descrip_gral, 'costo' => $producto->costo, 'success' => true];
            return $response;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function entrada_producto(Request $request)
    {
        dd($request->all());
        try {
            DB::beginTransaction();
            $entrada_producto = EntradaProducto::create([
                'entrada_id' => $request->id,
                'producto_id' => $request->id_prod,
                'cantidad' => $request->cant_prod,
                'costo_total' => $request->pre_prod,
                'comentario' => $request->nota_prod
            ]);
            DB::commit();
            $producto = Producto::findOrFail($request->id);
            $nuevaCantidad = $producto->cantidad + $request->cantidad;
            DB::beginTransaction();
            $producto->cantidad = $nuevaCantidad;
            $producto->updated_user_id = Auth::user()->id;
            $producto->save();
            DB::commit();

            $response = ['success' => true];

        } catch (\Throwable $th) {
            $response = ['success' => false];
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    /* 
    *
    *
    *
    */
    public function folioEntrada($year, $conse, $tipo)
    {
        $sufTipo = ($tipo == 'ENTRADA') ? 'ETD' : 'SLD';
        $subyear = substr($year,2,2);
        $len = '000000000000';
        $stlen = strlen($sufTipo.$subyear.$conse);
        $consecutivo = substr($len, 0, 12-$stlen);
        $folio = $sufTipo.$subyear.$consecutivo.$conse;
        return $folio;
    }
}
