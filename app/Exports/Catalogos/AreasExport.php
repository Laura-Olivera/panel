<?php

namespace App\Exports\Catalogos;

use App\Models\Catalogos\Area;
use Carbon\Carbon;
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

    /**
     * @param  Collection  $collection
     */
    public function __construct()
    {
        $areas = Area::select('areas.cve_area', 'areas.nombre', DB::raw("CONCAT(users.nombre,' ',users.primer_apellido,' ',users.segundo_apellido)"), 'areas.estatus')
        ->join('users', 'areas.responsable', '=', 'users.cve_usuario')
        ->orderBy('areas.nombre', 'ASC')
        ->get();
        foreach ($areas as $area) {
            $area->estatus = ($area->estatus) ? "ACTIVO" : "BAJA";
        }
        $this->collection = $areas;
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
        return [
            'Clave',
            'Nombre',
            'Responsable',
            'Estado'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                //ENCABEZADO DE DOCUMENTOS

                $event->sheet->setCellValue('A1', 'REPORTE DE CONTROL DE ÁREAS')->mergeCells('A1:G1')
                    ->getStyle('A1:G1')
                    ->getFont()
                    ->setSize(26)
                    ->setBold(true);
                $event->sheet->getStyle('A1:G1')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $event->sheet->setCellValue('A2', 'FECHA DE CONSULTA')->mergeCells('A2:C2')
                    ->getStyle('A2:C2')
                    ->getFont()
                    ->setSize(12);
                $event->sheet->setCellValue('D2', Carbon::now())->mergeCells('D2:G2')
                    ->getStyle('D2:G2')
                    ->getFont()
                    ->setSize(13)
                    ->setBold(true);
                $event->sheet->setCellValue('A3', 'USUARIO DE CONSULTA')->mergeCells('A3:C3')
                    ->getStyle('A3:C3')
                    ->getFont()
                    ->setSize(12);
                $usuario = strtoupper(Auth::user()->nombre.' '.Auth::user()->primer_apellido.' '.Auth::user()->segundo_apellido);
                $event->sheet->setCellValue('D3', $usuario)->mergeCells('D3:G3')
                    ->getStyle('D3:G3')
                    ->getFont()
                    ->setSize(13)
                    ->setBold(true);

                //ESTILO DE DATOS
                $lastRow = $event->sheet->getHighestRow();
                $dataRange = 'A1:'.'G'.$lastRow;
                $event->sheet->getStyle($dataRange)->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT)
                    ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
                    ->setIndent(1);
                $event->sheet ->getStyle('A5:D5')
                    ->getFont()
                    ->setSize(13)
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
        return 'Areas';
    }

    public function startCell(): string
    {
        return 'A5';
    }
}
