<?php

namespace App\Exports\Catalogos;

use App\Models\Catalogos\Area;
use App\Models\Catalogos\Producto;
use App\Models\Catalogos\Proveedor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AreasExport implements FromCollection, WithCustomStartCell, WithHeadings, ShouldAutoSize, WithEvents, WithStyles, WithTitle
{
    use Exportable;

    /**
     * @var Collection
     */
    protected $collection;
    protected $reporte;

    /**
     * @param  Collection  $collection
     */
    public function __construct(string $reporte)
    {
        $this->reporte = $reporte;
        switch ($this->reporte) {
            case 'areas':
                $areas = Area::select('areas.cve_area', 'areas.nombre', 'areas.responsable', 'areas.estatus')->get();
                foreach ($areas as $area) {
                    $area->estatus = ($area->estatus) ? "ACTIVO" : "BAJA";
                }
                $this->collection = $areas;
                break;
                
            case 'usuarios':
                $usuarios = User::select(DB::raw("CONCAT(users.nombre,' ',users.primer_apellido,' ',users.segundo_apellido) as nombre"), 
                                                        'users.curp', 'users.rfc', 'users.telefono','users.email','users.usuario', 'users.cve_usuario', 
                                                        'areas.nombre as area', 'users.estatus')
                                                ->join('areas', 'users.area', '=', 'areas.cve_area')
                                                ->get();
                foreach ($usuarios as $usuario) {
                    $usuario->estatus = ($usuario->estatus) ? "ACTIVO" : "BAJA";                    
                }
                $this->collection = $usuarios;
                break;

            case 'proveedores':
                $proveedores = Proveedor::select('cve_prov', 'nombre', 'rfc', 'telefono', 'extension', 'direccion', 'email', 'estatus')->get();
                foreach ($proveedores as $proveedor) {
                    $proveedor->estatus = ($proveedor->estatus) ? "ACTIVO" : "BAJA";
                }
                $this->collection = $proveedores;
                break;

            case 'productos':
                $productos = Producto::select('productos.codigo', 'productos.nombre', 'productos.modelo', 'productos.marca', 'proveedores.nombre as proveedor',
                                               'categorias.nombre as categoria', 'productos.precio_compra', 'productos.precio_venta', 'productos.cantidad',
                                                'productos.estatus')
                                            ->join('proveedores', 'productos.proveedor_id', '=', 'proveedores.id')
                                            ->join('categorias', 'productos.categoria_id', '=','categorias.id')
                                            ->get();
                foreach ($productos as $producto) {
                    $producto->estatus ($producto->estatus) ? "ACTIVO" : "BAJA";
                }
                $this->collection = $productos;
                break;
            default:
                # code...
                break;
        }        
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->collection; 
    }

    public function headings(): array
    {
        $first = $this->collection->first()->toArray();
        if ($first) {
            return array_keys($first);  
        }

        return [];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                //VARIABLES SELECCION DE CELDAS

                $lastColumn = 'A';
                $lastRow = $event->sheet->getHighestRow();
                $totalColumns = count($this->collection->first()->toArray());
                for($i=0; $i < $totalColumns; $i++){
                    $lastColumn++;
                }
                $cellRange = 'A6:'.$lastColumn.'6';
                $dataRange = 'A6:'.$lastColumn.$lastRow;
                $column = 'A';
                for($i=0; $i < $totalColumns; $i++){
                    $column++;
                    $event->sheet->getColumnDimension($column)->setAutoSize(true);
                }

                //ESTILOS EXPORTACION PDF

                $event->sheet->getPageSetup()
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $event->sheet->getPageSetup()
                    ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);

                //ENCABEZADO DE DOCUMENTOS

                $event->sheet->setCellValue('A1', 'REPORTE DE CONTROL DE '.strtoupper($this->reporte))->mergeCells('A1:'.$lastColumn.'1')
                    ->getStyle('A1:'.$lastColumn.'1')
                    ->getFont()
                    ->setSize(26)
                    ->setBold(true);
                $event->sheet->getStyle('A1:'.$lastColumn.'1')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $event->sheet->getRowDimension('2')->setRowHeight(5);
                $event->sheet->setCellValue('A3', 'FECHA DE CONSULTA')->mergeCells('A3:B3')
                    ->getStyle('A3:B3')
                    ->getFont()
                    ->setSize(12);
                $event->sheet->setCellValue('C3', Carbon::now())->mergeCells('C3:D3')
                    ->getStyle('C3:D3')
                    ->getFont()
                    ->setSize(12)
                    ->setBold(true);
                $event->sheet->setCellValue('A4', 'USUARIO DE CONSULTA')->mergeCells('A4:B4')
                    ->getStyle('A4:B4')
                    ->getFont()
                    ->setSize(12);
                $usuario = strtoupper(Auth::user()->nombre.' '.Auth::user()->primer_apellido.' '.Auth::user()->segundo_apellido);
                $event->sheet->setCellValue('C4', $usuario)->mergeCells('C4:D4')
                    ->getStyle('C4:D4')
                    ->getFont()
                    ->setSize(12)
                    ->setBold(true);

                //ESTILO DE DATOS

                $event->sheet->getRowDimension('5')->setRowHeight(5);
                $event->sheet->getStyle($dataRange)->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT)
                    ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
                    ->setIndent(1);
                $event->sheet->getStyle($cellRange)
                    ->getFont()
                    ->setSize(12)
                    ->setBold(true);
            },
        ];
    }

    public function styles(Worksheet $sheet)
    {
    	return [
			5 => ['font' => ['bold' => true], 'size' => [13]],
    	];
    }

    public function title(): string
    {
        return $this->reporte;
    }

    public function startCell(): string
    {
        return 'A6';
    }
}
