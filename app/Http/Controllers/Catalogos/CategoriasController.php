<?php

namespace App\Http\Controllers\Catalogos;

use App\Helpers\Bitacora;
use App\Http\Controllers\Controller;
use App\Models\Catalogos\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class CategoriasController extends Controller
{
    public function index()
    {
        $class = "categorias";
        $filename = 'Reporte_categorias';
        $plantilla = 'categorias_import.csv';
        return view('catalogos.categorias.lista_categorias', compact('class', 'filename', 'plantilla'));
    }

    public function listar_categorias()
    {
        $categorias = Categoria::all();
        return DataTables::of($categorias)->toJson();
    }

    public function create()
    {
        return view('catalogos.categorias.modal_crear_categoria');
    }

    public function store(Request $request)
    {
        try {
            $existe = Categoria::where('nombre','=', $request->nombre)->exists();
            if($existe){
                $response = ['success' => false, 'message' => 'La categoria ya existe.'];
            }else{
                $user = Auth::user()->id;
                DB::beginTransaction();
                $categoria = Categoria::create([
                    'nombre' => $request->nombre,
                    'cve_cat' => $request->clave,
                    'estatus' => $request->estatus,
                    'created_user_id' => $user,
                ]);
                DB::commit();
                $data = request();
                $accion = 'Registro nueva categoria';
                Bitacora::usuarios($data, $accion);
                $response = ['success' => true, 'message' => 'La categoria se registro correctamente.'];
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al crear categoria', 'warning');
            $response = ['success' => false, 'message' => 'Error al registrar la categoria.'];
        }
        return $response;
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('catalogos.categorias.modal_editar_categoria', compact('categoria'));
    }

    public function update(Request $request)
    {
        try {
            $categoria = Categoria::findOrFail($request->id);
            $user = Auth::user()->id;
            DB::beginTransaction();
            $categoria->nombre = $request->nombre;
            $categoria->estatus = $request->estatus;
            $categoria->updated_user_id = $user;
            $categoria->save();
            if ($categoria){
                DB::commit();
            }
            $datos = request();
            $accion = 'Actualizacion de categoria';
            Bitacora::usuarios($datos, $accion);
            $response = ['success' => true, 'message' => 'La categoria se actualizo correctamente.'];
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al actualizar categoria', 'warning');
            $response = ['success' => false, 'message' => 'Error al actualizar la categoria.'];
        }
        return $response;
    }
}
