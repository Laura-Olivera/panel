<?php

namespace App\Imports\Catalogos;

use App\Models\Catalogos\Area;
use App\Models\User;
use App\Services\Claves;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
                'responsable' => $row['no_empleado_responsable'],
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
            'no_empleado_responsable' => ['required', 'min:0'],
        ];
    }

    public function customValidationMessages()
    {
        return [
            'cve_area.required' => 'La clave del area es requerido',
            'cve_area.unique' => 'La clave de area debe ser unica',
            'nombre.required' => 'El nombre del area es requerido',
            'no_empleado_responsable.required' => 'El numero de empleado del responsable de area es requerido',
            'no_empleado_responsable.min' => 'El numero de empleado no existe',
        ];
    }

    public function prepareForValidation($data, $index)
    {

        $getClave = new Claves;
        $cve_area = $getClave->generarClave('areas', 'cve_area');
        $cve_usuario = User::where('cve_usuario', '=', $data['no_empleado_responsable'])->where('estatus', '=', true)->first();
        $data['cve_area'] = $data['cve_area'] ?? $cve_area;
        $data['no_empleado_responsable'] = (!empty($cve_usuario)) ? $cve_usuario->id : 2;
        
        return $data;
    }

}

