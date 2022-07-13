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
use Illuminate\Support\Facades\Crypt;
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

    public function buscar_proveedo($id)
    {
        try {
            $proveedor = Proveedor::findOrFail($id);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function store(Request $request)
    {
        try {
            $user = Auth::user();
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
                "cve_entrada" => $folio,
                "proveedor_id" => $request->proveedor_id,
                "factura" => $request->factura,
                "fac_fecha_emision" => $request->fac_fecha_emision,
                "fac_fecha_operacion" => $request->fac_fecha_operacion,
                "fac_path" => $db_path,
                "fac_subtotal" => $request->fac_subtotal,
                "fac_impuestos" => $request->fac_impuestos,
                "fac_extras" => $request->fac_extras,
                "fac_total" => $request->fac_total,
                "fac_total_letra" => $request->fac_total_letra,
                "fac_forma_pago" => $request->fac_forma_pago,
                "fac_metodo_pago" => $request->fac_metodo_pago,
                "fac_notas" => ($request->fac_notas) ? $request->fac_notas : "SIN OBSERVACIONES",
                "entrada_notas" => ($request->entrada_notas) ? $request->entrada_notas : "SIN OBSERVACIONES",
                "fecha_recepcion" => $request->fecha_recepcion,
                "consecutivo" => $request->consecutivo,
                "created_user" => $user->usuario,
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
        $entrada_productos = DB::table('inventario_entradas_productos')->select('inventario_entradas_productos.*', 'productos.codigo as producto')
            ->join('productos', 'productos.id', '=', 'inventario_entradas_productos.producto_id')
            ->where('inventario_entradas_productos.entrada_id', '=', $entrada->id)->get();
        return view('inventario.entradas.ver_entrada', compact('entrada', 'entrada_productos'));
    }

    //select "inventario_entradas_producto".*, "productos"."codigo" as "producto" from "inventario_entradas_productos" inner join "productos" on "productos"."id" = "inventario_entradas_productos"."producto_id" where "inventario_entradas_productos"."entrada_id" = 4;

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
        try {

            $existe = EntradaProducto::where('entrada_id', '=', $request->id)->where('producto_id', '=', $request->id_prod)->exists();

            if($existe){    
                $response = ['success' => false, 'message' => 'El producto ya ha sido agregado a la entrada.'];                
            }else{
                $prod_total = DB::table('inventario_entradas_productos')->select('entrada_id', DB::raw('SUM(costo_total) as prod_total'))
                                ->groupBy('entrada_id')
                                ->where('entrada_id', '=', $request->id)->first();
                $fac_total = Entrada::findOrFail($request->id);
                $total = ($prod_total) ? $prod_total->prod_total + $request->pre_prod : 0;
                //dd($prod_total);
                //dd(($prod_total->prod_total > $fac_total->fac_total) ? true : false );
                if ($total > $fac_total->fac_total) {
                    $response = ['success' => false, 'message' => 'El costo total de productos en factura sobrepasa el costo total de la entrada. Verifique la informacion.'];
                } else {
                    if(is_null($request->nota_prod)){
                        $request->nota_prod = "SIN OBSERVACIONES";
                    }
                    DB::beginTransaction();
                    $entrada_producto = EntradaProducto::create([
                        'entrada_id' => $request->id,
                        'producto_id' => $request->id_prod,
                        'cantidad' => $request->cant_prod,
                        'costo_total' => $request->pre_prod,
                        'comentario' => $request->nota_prod
                    ]);
                    DB::commit();
                    if ($entrada_producto) {
                        $producto = Producto::findOrFail($request->id_prod);
                        $nuevaCantidad = $producto->cantidad + $request->cant_prod;
                        DB::beginTransaction();
                        $producto->cantidad = $nuevaCantidad;
                        $producto->updated_user_id = Auth::user()->id;
                        $producto->save();
                        DB::commit();
                    }
                    $data = request();
                    if (is_null($data['nota_prod'])) {
                        $data['nota_prod'] = 'SIN OBSERVACIONES';
                    }
                    $accion = 'Registro nuevo producto en entrada';
                    Bitacora::usuarios($data, $accion);
                    $data_prod = [
                        'entrada_id' => $request->id,
                        'producto_id' => $request->id_prod,
                        'producto' => $producto->codigo,
                        'cantidad' => $request->cant_prod,
                        'total' => $request->pre_prod,
                        'notas' => $request->nota_prod
                    ];
                    $response = ['success' => true, 'message' => 'El producto se agrego a la entrada.', 'data' => $data_prod];
                }
            }

        } catch (\Throwable $th) {
            DB::rollback();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al crear entrada producto', 'warning');
            $response = ['success' => false, 'message' => 'Ha ocurrido un error, intente mas tarde.'];
        }

        return $response;
    }

    public function eliminar_producto(Request $request)
    {
        try {
            DB::table('inventario_entradas_productos')->where('entrada_id', '=', $request->id)->where('producto_id', '=', $request->id_prod)->delete();
            $data = request();
            $accion = 'Eliminar producto en entrada';
            Bitacora::usuarios($data, $accion);
            $response =['success' => true, 'message' => 'Producto eliminado de entrada correctamente.'];
        } catch (\Throwable $th) {
            DB::rollback();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al eliminar entrada producto', 'warning');
            $response = ['success' => false, 'message' => 'Ha ocurrido un error, intente mas tarde.'];
        }

        return $response;
    }

    public function editar_producto($entrada_id, $producto_id)
    {
        $entrada_producto = DB::table('inventario_entradas_productos')->select('inventario_entradas_productos.*', 'productos.codigo as producto')
        ->join('productos', 'productos.id', '=', 'inventario_entradas_productos.producto_id')
        ->where('inventario_entradas_productos.producto_id', '=', $producto_id)
        ->where('inventario_entradas_productos.entrada_id', '=', $entrada_id)->first();
        return view('inventario.entradas.models.modal_edit_producto_entrada', compact('entrada_producto'));
    }

    public function guardar_edit(Request $request)
    {
        $entrada_producto = DB::table('inventario_entradas_productos')->where('producto_id', '=', $request->id_prod)->where('entrada_id', '=', $request->id)->first();
        $producto = Producto::findOrFail($request->id_prod);
        try {
            $prod_total = DB::table('inventario_entradas_productos')->select('entrada_id', DB::raw('SUM(costo_total) as prod_total'))
                                ->groupBy('entrada_id')
                                ->where('entrada_id', '=', $request->id)->first();
            $fac_total = Entrada::findOrFail($request->id);
            $total = ($prod_total) ? $prod_total->prod_total + $request->pre_prod : 0;
            if ($total > $fac_total->fac_total) {
                $response = ['success' => false, 'message' => 'El costo total de productos en factura sobrepasa el costo total de la entrada. Verifique la informacion.'];
            } else {
                if(is_null($request->nota_prod)){
                    $request->nota_prod = "SIN OBSERVACIONES";
                }
                $cantidad_anterior = $producto->cantidad - $entrada_producto->cantidad;
                //dd($cantidad_anterior);
                $entrada_producto = DB::table('inventario_entradas_productos')->where('producto_id', '=', $request->id_prod)->where('entrada_id', '=', $request->id)->delete();
                DB::beginTransaction();
                $entrada_producto = EntradaProducto::create([
                    'entrada_id' => $request->id,
                    'producto_id' => $request->id_prod,
                    'cantidad' => $request->cant_prod,
                    'costo_total' => $request->pre_prod,
                    'comentario' => $request->nota_prod
                ]);
                DB::commit();
                $nuevaCantidad = $request->cant_prod + $cantidad_anterior;
                //dd($nuevaCantidad);
                DB::beginTransaction();
                $producto->cantidad = $nuevaCantidad;
                $producto->updated_user_id = Auth::user()->id;
                $producto->save();
                DB::commit();
                $data = request();
                if (is_null($data['nota_prod'])) {
                    $data['nota_prod'] = 'SIN OBSERVACIONES';
                }
                $accion = 'Actualizacion de producto en entrada';
                Bitacora::usuarios($data, $accion);
                $response = ['success' => true, 'message' => 'Producto actualizado correctamente.'];
            }
        } catch (\Throwable $th) {
            DB::rollback();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al actualizar entrada producto', 'warning');
            $response = ['success' => false, 'message' => 'Ha ocurrido un error, intente mas tarde.'];
        }
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cve_entrada)
    {
        $entrada = Entrada::where('cve_entrada', '=', $cve_entrada)->first();
        $proveedores = Proveedor::all();
        return view('inventario.entradas.editar_entrada', compact('entrada', 'proveedores'));
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
            $entrada = Entrada::findOrFail($request->id);
            $user = Auth::user()->id;
            $year = date('Y', strtotime($entrada->fac_fecha));
            $existeArchivo = false;
            if($request->hasFile('fac_path')){
                $factura = $request->file('fac_path');
                $extension = $factura->getClientOriginalExtension();

                $fac_name = "{$entrada->cve_entrada}.{$extension}";

                $disk = Storage::disk('files_upload');                
                $path = 'facturas/'. $year. '/';
                $db_path = Storage::disk('files_upload')->url('facturas/'.$year);

                if(is_file($db_path.$fac_name)){
                    $respaldo = "{$entrada->cve_entrada}_".date('Ymd_His').".{$extension}";
                    $disk->move( $path.$fac_name, "eliminados/{$path}{$respaldo}" );
                }

                $disk->put($path.$fac_name, file_get_contents($request->file('fac_path')), 'public');    
                $existeArchivo = true;            
            }

            DB::beginTransaction();
            
            $entrada->proveedor_id = $request->proveedor;
            $entrada->factura = $request->factura;
            $entrada->fac_fecha = $request->fac_fecha;
            if ($existeArchivo) {
                $entrada->fac_path = $db_path;
            }
            $entrada->fac_total = $request->fac_total;
            $entrada->fac_notas = $request->fac_notas;
            $entrada->notas = $request->notas;
            $entrada->estatus = $request->estatus;
            $entrada->updated_user_id = $user;
            $entrada->save();

            DB::commit();

            $data = request();
            $accion = 'Actualizacion de entrada';
            Bitacora::usuarios($data, $accion);
            $response = ['success' => true, 'message' => 'Entrada registrada correctamente.', 'entrada' => $request->cve_entrada];

        } catch (\Throwable $th) {
       
            DB::rollback();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al actualizar entrada', 'warning');
            $response = ['success' => false, 'message' => 'Error al actualizar la entrada.'];
       
        }

        return $response;
    }

    /* {"_token":"PIXxXKwh12CsIRrPIj2bb2i554GLqBAQYdJ62wgV",
        "proveedor":"5",
        "factura":"7",
        "fac_fecha":"2022-06-16",
        "fac_total":"15800.00",
        "estatus":"POR PAGAR",
        "fac_notas":"---------------------",
        "notas":"<h4><strong>SIN OBSERVACIONES<\/strong><\/h4>",
        "fac_path":{}
    }; */


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
    public function factura_digital($encryp_path, $fac_name)
    {
        $path = $encryp_path;
        $name = $fac_name;
        $url = $path.''.$name;
        if( is_file($url) ) {
            return response()->file( $url );
        }else{
            return abort(404);
        }
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
