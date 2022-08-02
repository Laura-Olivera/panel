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
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AreaImport implements ToCollection, WithHeadingRow, WithValidation, SkipsEmptyRows
{
    use Importable;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $getClave = new Claves;
            $cve_area = ($row['cve_area']) ? $row['cve_area'] : $getClave->generarClave('areas', 'cve_area');
            $usuario = User::where('cve_usuario', '=', $row['no_empleado_responsable'])->where('estatus', '=', true)->first();
            $nombre = (!empty($usuario)) ? $usuario->cve_usuario : null;
            $existe = Area::where('cve_area', '=', $cve_area)->exists();
            if ($existe) {
                $area = Area::where('cve_area', '=', $cve_area)->first();
                DB::beginTransaction();
                $area->nombre = $row['nombre'];
                $area->responsable = $nombre;
                $area->estatus = true;
                $area->updated_user_id = Auth::user()->id;
                $area->save();
                DB::commit();
            } else {
                $data = [
                    'nombre' => $row['nombre'],
                    'cve_area' => $cve_area,                        
                    'responsable' => $nombre,
                    'estatus' => true,
                    'created_user_id' => Auth::user()->id,
                ];
                Area::create($data);
            }    
            
        }
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required',
            'no_empleado_responsable' => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nombre.required' => 'El nombre del area es requerido',
            'no_empleado_responsable.required' => 'El numero de empleado del responsable de area es requerido',
        ];
    }

}

