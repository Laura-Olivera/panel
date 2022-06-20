<?php

namespace App\Http\Controllers\Inventario;

use App\Helpers\Bitacora;
use App\Http\Controllers\Controller;
use App\Models\Catalogos\Categoria;
use App\Models\Inventario\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class ProductosController extends Controller
{
    public function index()
    {
        return view('inventario.productos.listar_productos');
    }

    public function listar_productos()
    {
        $productos = Producto::all();
        return DataTables::of($productos)->toJson();
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('inventario.productos.modal_crear_producto', compact('categorias'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $producto = Producto::create([
                'nombre' => $request->nombre,
                'descrip_gral' => $request->general,
                'descrip_tec' => $request->tecnica,
                'modelo' => $request->modelo,
                'marca' => $request->marca,
                'proveedor_id' => $request->proveedor,
                'codigo' => $request->codigo,
                'costo' => $request->costo,
                'cantidad' => $request->cantidad,
                'categoria_id' => $request->categoria,
                'estatus' => $request->estatus,
                'created_user_id' => Auth::user()->id,
            ]);
            DB::commit();

            $data = request();
            $accion = 'Registro nuevo producto';
            Bitacora::usuarios($data, $accion);

            $response = ['success' => true, 'message' => 'El producto se registro correctamente.'];

        } catch (\Throwable $th) {
            DB::rollBack();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al registrar producto', 'warning');
            $response = ['success' => false, 'message' => 'Error al registrar producto.'];
        }

        return $response;
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('inventario.productos.modal_editar_producto', compact('producto'));
    }

    public function update(Request $request)
    {
        try {
            $producto = Producto::findOrFail($request->id);

            DB::beginTransaction();
            $producto->nombre = $request->nombre;
            $producto->descrip_gral = $request->general;
            $producto->descrip_tec = $request->tecnica;
            $producto->modelo = $request->modelo;
            $producto->marca = $request->marca;
            $producto->proveedor_id = $request->proveedor;
            $producto->codigo = $request->codigo;
            $producto->costo = $request->costo;
            $producto->cantidad = $request->cantidad;
            $producto->categoria_id = $request->categoria;
            $producto->estatus = $request->estatus;
            $producto->updated_user_id = Auth::user()->id;
            DB::commit();

            $data = request();
            $accion = 'Actualizacion de producto';
            Bitacora::usuarios($data, $accion);

            $response = ['success' => true, 'message' => 'El producto se actualizo correctamente.'];
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al actualizar producto', 'warning');
            $response = ['success' => false, 'message' => 'Error al actualizar el producto.'];
        }

        return $response;
    }
}
