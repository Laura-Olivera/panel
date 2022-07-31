<?php

namespace App\Http\Controllers\Catalogos;

use App\Exports\Catalogos\AreasExport;
use App\Helpers\Bitacora;
use App\Http\Controllers\Controller;
use App\Imports\Catalogos\AreaImport;
use App\Models\Catalogos\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogos.areas.lista_areas');
    }

    public function listar_areas()
    {
        $areas = Area::all();
        return DataTables::of($areas)->toJson();
    }

    /**
     * 
     *
     * 
     */
    public function import_data(Request $request)
    {
        $request->validate([
            'importar' => 'required'
        ],
        $message = [
            'required'=>'el campo :attribute es requerido'
        ]);

        try {
            Excel::import(new AreaImport, $request->file('importar')->store('temp'));
            return back();
        } catch (\Throwable $th) {
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al importar areas', 'warning');
            return back()->withErrors(['field_name' => ['Error al importar datos. Verifique que los datos sean correctos.']]);;
        }
    }

    /**
     * 
     *
     * 
     */
    public function export_data()
    {
        return Excel::download(new AreasExport, 'areas.xlsx');
    }

    /**
     * 
     *
     * 
     */
    public function export_pdf()
    {
        return (new AreasExport)->download('reporte_areas.pdf', \Maatwebsite\Excel\Excel::MPDF);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.areas.modal_crear_area');
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
            DB::beginTransaction();
            $area = Area::create([
                'nombre' => $request->nombre,
                'cve_area' => $request->clave,
                'estatus' => $request->estatus,
                'created_user_id' => Auth::user()->id
            ]);
            DB::commit();

            $data = request();
            $accion = 'Registro nueva area';
            Bitacora::usuarios($data, $accion);

            $response = ['success' => true, 'message' => 'El area se registro correctamente.'];
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al crear area', 'warning');
            $response = ['success' => false, 'message' => 'Error al registrar area.'];
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
        $area = Area::findOrFail($id);
        return view('catalogos.areas.modal_editar_area', compact('area'));
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
            $area = Area::findOrfail($request->id);

            DB::beginTransaction();
            $area->nombre = $request->nombre;
            $area->cve_area = $request->clave;
            $area->estatus = $request->estatus;
            $area->updated_user_id = Auth::user()->id;
            $area->save();
            DB::commit();

            $data = request();
            $accion = 'Actualizacion de area';
            Bitacora::usuarios($data, $accion);

            $response = ['success' => true, 'message' => 'El area se actualizo correctamente.'];

        } catch (\Throwable $th) {
            
            DB::rollBack();
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al actualizar area', 'warning');
            $response = ['success' => false, 'message' => 'Error al actualizar area.'];

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
