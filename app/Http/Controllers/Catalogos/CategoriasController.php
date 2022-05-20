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
        return view('catalogos.categorias.lista_categorias');
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
                $empleado = session('empleado')->clave_empleado;
                DB::beginTransaction();
                $categoria = Categoria::create([
                    'nombre' => $request->nombre,
                    'descripcion' => $request->descripcion,
                    'path' => $request->path,
                    'slug' => $request->slug,
                    'clave_cat' => $request->clave,
                    'estatus' => 1,
                    'created_user_id' => $user,
                    'updated_user_id' => $user
                ]);
                DB::commit();
                $data = request();
                $accion = 'EL usuario '.$empleado.' creo la categoria '.$categoria->nombre;
                Bitacora::admin($data, $accion);
                $response = ['success' => true, 'message' => 'La categoria se registro correctamente.'];
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
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
            $empleado = session('empleado')->clave_empleado;
            DB::beginTransaction();
            $categoria->nombre = $request->nombre;
            $categoria->descripcion = $request->descripcion;
            $categoria->path = $request->path;
            $categoria->slug = $request->slug;
            $categoria->estatus = $request->estatus;
            $categoria->updated_user_id = $user;
            $categoria->save();
            if ($categoria){
                DB::commit();
            }
            $datos = request();
            $accion = 'El usuario '.$empleado.' actualizo la categoria '.$categoria->nombre;
            Bitacora::admin($datos, $accion);
            $response = ['success' => true, 'message' => 'La categoria se actualizo correctamente.'];
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            $response = ['success' => false, 'message' => 'Error al actualizar la categoria.'];
        }
        return $response;
    }
}
