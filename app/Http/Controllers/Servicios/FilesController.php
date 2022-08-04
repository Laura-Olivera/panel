<?php

namespace App\Http\Controllers\Servicios;

use App\Exports\Catalogos\AreasExport;
use App\Helpers\Bitacora;
use App\Http\Controllers\Controller;
use App\Imports\Catalogos\AreaImport;
use App\Imports\UsersImport;
use App\Models\Catalogos\Area;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class FilesController extends Controller
{
    /**
     * Import data to table from CSV/XLSX file
     * @param  \Illuminate\Http\Request  $request
     * @param  object $class_import
     * @return redirect Back()
     * 
     */
    public function import_data(Request $request, $class_import)
    {
        $request->validate([
            'importar' => 'required'
        ],
        $message = [
            'required'=>'el campo :attribute es requerido'
        ]);
        try {
            switch ($class_import) {
                case 'areas':                    
                    $importar = new AreaImport;                   
                    Excel::import($importar, $request->file('importar')->store('temp'));
                    $errors = [];
                    foreach ($importar->failures() as $error) {
                        $mensaje = 'Error fila '.$error->row().': '.$error->errors()[0];
                        array_push($errors, $mensaje);
                    }
                    
                    $data = request();
                    $accion = 'Importar registros catalogo areas';
                    Bitacora::usuarios($data, $accion);

                    return back()->withErrors($errors);
                    break;

                case 'usuarios':                    
                    $importar = new UsersImport;                   
                    Excel::import($importar, $request->file('importar')->store('temp'));
                    $errors = [];
                    foreach ($importar->failures() as $error) {
                        $mensaje = 'Error fila '.$error->row().': '.$error->errors()[0];
                        array_push($errors, $mensaje);
                    }

                    $data = request();
                    $accion = 'Importar registros catalogo usuarios';
                    Bitacora::usuarios($data, $accion);

                    return back()->withErrors($errors);
                    break;

                default:
                    return back()->withErrors('***Error al importar datos, intente mas tarde.');
                    break;
            }

        } catch (\Throwable $th) {
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al importar registros catalogo areas', 'warning');
            return back()->withErrors('Error al importar datos, intente mas tarde.');
        }
    }

    /**
     * Export data from table to XLSX file
     * @param  string $class_export 
     * @param  string $filename
     * @return maatwebsite\Excel\Facades\Excel download excel file
     * 
     */
    public function export_data($class_export, $filename)
    {
        switch ($class_export) {
            case 'areas':
                $areas= Area::select('cve_area', 'nombre', 'responsable')->get();
                return Excel::download(new AreasExport($areas, 'AREAS'), $filename.'.xlsx');
                break;

            case 'usuarios':
                $array = [];
                $collection = new Collection();          
                $usuarios = DB::table('users')->select(DB::raw("CONCAT(users.nombre,' ',users.primer_apellido,' ',users.segundo_apellido) as nombre"), 
                                                        'users.curp', 'users.rfc', 'users.telefono','users.email','users.usuario', 'users.cve_usuario', 
                                                        'areas.nombre as area', 'users.estatus')
                                               ->join('areas', 'users.area', '=', 'areas.cve_area')
                                               ->orderBy('users.nombre', 'ASC')
                                               ->get();
                foreach ($usuarios as $usuario) {
                    array_push($array, $usuario);
                }
                //dd($array);
                return Excel::download(new AreasExport('USUARIOS'), $filename.'.xlsx');
                break;

            default:
                return back()->withErrors('Error al exportar reporte, intente mas tarde.');
                break;
        }
        
    }

    /**
     * Export data from table to PDF file
     * @param  string $class_export
     * @param  string $filename
     * @return maatwebsite\Excel\Facades\Excel::MPDF download pdf file
     * 
     */
    public function export_pdf($class_export, $filename)
    {
        switch ($class_export) {
            case 'areas':
                //return (new AreasExport)->download($filename.'.pdf', \Maatwebsite\Excel\Excel::MPDF);
                break;
            
            default:
                return back()->withErrors('Error al exportar reporte, intente mas tarde.');
                break;
        }
    }

    /** 
    * Download file EXCEL|CSV|PDF
    * @param string $path
    * @param string $name file name with extension
    * @return \Illuminate\Http\Response $file
    *
    */
    public function descargar_documento($path, $name)
    {
        
        $url = Crypt::decryptString($path).'/'.$name;
        
        if( is_file($url) ) {
            return response()->download( $url );
        }else{
            return abort(404);
        }
    }
}
