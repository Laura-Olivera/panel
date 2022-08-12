<?php

namespace App\Imports\Catalogos;

use App\Models\Catalogos\Area;
use App\Services\Claves;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AreaImport implements ToCollection, WithHeadingRow, SkipsEmptyRows, SkipsOnFailure, WithValidation
{
    use Importable, SkipsFailures;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Area::create([
                'nombre' => $row['nombre'],
                'cve_area' => $row['cve_area'],                        
                'responsable' => $row['empleado_responsable'],
                'estatus' => true,
                'created_user_id' => Auth::user()->id,
            ]);
            
        }
    }

    public function rules(): array
    {
        return [
            'cve_area' => ['required', 'unique:areas,cve_area'],
            'nombre' => 'required',
            'empleado_responsable' => ['required'],
        ];
    }

    public function customValidationMessages()
    {
        return [
            'cve_area.required' => 'La clave del area es requerido',
            'cve_area.unique' => 'La clave de area debe ser unica',
            'nombre.required' => 'El nombre del area es requerido',
            'empleado_responsable.required' => 'El nombre del empleado responsable de area es requerido',
        ];
    }

    public function prepareForValidation($data, $index)
    {

        $getClave = new Claves;
        $cve_area = $getClave->generarClave('areas', 'cve_area');
        $data['cve_area'] = $data['cve_area'] ?? $cve_area;
        
        return $data;
    }

}

