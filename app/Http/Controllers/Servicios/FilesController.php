<?php

namespace App\Http\Controllers\Servicios;

use App\Exports\Catalogos\AreasExport;
use App\Helpers\Bitacora;
use App\Http\Controllers\Controller;
use App\Imports\Catalogos\AreaImport;
use App\Imports\Catalogos\CategoriasImport;
use App\Imports\Catalogos\ProductosImport;
use App\Imports\Catalogos\ProveedoresImport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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
                        $mensaje = 'Error al importar fila '.$error->row().': '.$error->errors()[0];
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
                        $mensaje = 'Error al importar fila '.$error->row().': '.$error->errors()[0];
                        array_push($errors, $mensaje);
                    }

                    $data = request();
                    $accion = 'Importar registros catalogo usuarios';
                    Bitacora::usuarios($data, $accion);

                    return back()->withErrors($errors);
                    break;

                case 'categorias':                    
                    $importar = new CategoriasImport;                   
                    Excel::import($importar, $request->file('importar')->store('temp'));
                    $errors = [];
                    foreach ($importar->failures() as $error) {
                        $mensaje = 'Error al importar fila '.$error->row().': '.$error->errors()[0];
                        array_push($errors, $mensaje);
                    }
    
                    $data = request();
                    $accion = 'Importar registros catalogo categorias';
                    Bitacora::usuarios($data, $accion);
    
                    return back()->withErrors($errors);
                    break;

                case 'proveedores':                    
                    $importar = new ProveedoresImport;                   
                    Excel::import($importar, $request->file('importar')->store('temp'));
                    $errors = [];
                    foreach ($importar->failures() as $error) {
                        $mensaje = 'Error al importar fila '.$error->row().': '.$error->errors()[0];
                        array_push($errors, $mensaje);
                    }
        
                    $data = request();
                    $accion = 'Importar registros catalogo proveedores';
                    Bitacora::usuarios($data, $accion);
        
                    return back()->withErrors($errors);
                    break;
                
                case 'productos':
                    $importar = new ProductosImport;
                    Excel::import($importar, $request->file('importar')->store('temp'));
                    $errors = [];
                    foreach ($importar->failures() as $error) {
                        $mensaje = 'Error al importar fila '.$error->row().': '.$error->errors()[0];
                        array_push($errors, $mensaje);
                    }
        
                    $data = request();
                    $accion = 'Importar registros catalogo productos';
                    Bitacora::usuarios($data, $accion);
        
                    return back()->withErrors($errors);
                    break;
                default:
                    return back()->withErrors('***Error al importar datos, intente mas tarde.');
                    break;
            }

        } catch (\Throwable $th) {
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al importar registros', 'warning');
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
        try {
            return Excel::download(new AreasExport($class_export), $filename.'.xlsx');
        } catch (\Throwable $th) {
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al exportar registros excel', 'warning');
            return back()->withErrors('Error al exportar datos, intente mas tarde.');
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
        try {
            return (new AreasExport($class_export))->download($filename.'.pdf', \Maatwebsite\Excel\Excel::MPDF);
        } catch (\Throwable $th) {
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            Bitacora::log(__METHOD__, $th->getFile(), $th->getLine(), $th->getMessage(), 'Error al exportar registros pdf', 'warning');
            return back()->withErrors('Error al exportar datos, intente mas tarde.');
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
