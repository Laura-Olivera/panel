<?php

namespace App\Http\Controllers\Servicios;

use App\Http\Controllers\Controller;
use App\Exports\Catalogos\AreasExport;
use App\Imports\Catalogos\AreaImport;
use Illuminate\Http\Request;
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
        switch ($class_import) {
            case 'areas':
                $importar = new AreaImport;
                Excel::import($importar, $request->file('importar')->store('temp'));
                $errors = [];
                foreach ($importar->failures() as $error) {
                    $mensaje = 'Error fila '.$error->row().': '.$error->errors()[0];
                    array_push($errors, $mensaje);
                }
                return back()->withErrors($errors);
                break;
            
            default:
                return back()->withErrors('Error al importar datos, intente mas tarde.');
                break;
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
                return Excel::download(new AreasExport, $filename.'.xlsx');
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
                return (new AreasExport)->download($filename.'.pdf', \Maatwebsite\Excel\Excel::MPDF);
                break;
            
            default:
                return back()->withErrors('Error al exportar reporte, intente mas tarde.');
                break;
        }
    }
}
