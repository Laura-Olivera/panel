<?php

namespace App\Imports;

use App\Models\Catalogos\Area;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToCollection, WithHeadingRow, WithValidation, SkipsEmptyRows, SkipsOnFailure
{

    use Importable, SkipsFailures;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $area = Area::where('cve_area', '=', $row['area'])->first();
            
            $cve_area = (!empty($area)) ? $area->cve_area : 'AADP000001';

            $user = User::create([
                'nombre' => $row['nombre'],
                'primer_apellido' => $row['primer_apellido'],
                'segundo_apellido' => $row['segundo_apellido'],
                'curp' => $row['curp'],
                'rfc' => $row['rfc'],
                'cve_usuario' => $row['no_empleado'],
                'telefono' => $row['telefono'],
                'area' => $cve_area,
                'usuario' => $row['usuario'],
                'email' => $row['email'],
                'password' => Hash::make($row['password']),
                'cambiar_password' => true,
                'estatus' => true,
                'intentos' => 0
            ]);

            $rol = DB::table('roles')->where('name', '=', $row['perfil'])->first();
            if (!empty($rol)) {
                $user->assignRole($rol->name);
            } else {
                $user->assignRole('InventarioConsulta');
            }
        }
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required',
            'primer_apellido' => 'required',
            'curp' => ['max:18'],
            'rfc' => ['max:13'],
            'no_empleado' => ['required', 'unique:users,cve_usuario'],
            'telefono' => ['max:10'],
            'area' => 'required',
            'usuario' => ['required', 'unique:users,usuario'],
            'email' => 'required',
            'password' => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'usuario.unique' => 'El NOMBRE DE USUARIO debe ser unico',
            'no_empleado.unique' => 'El NUMERO DE EMPLEADO debe ser unico',
            'nombre.required' => 'El campo NOMBRE es requerido',
            'primer_apellido.required' => 'El campo PRIMER_APELLIDO es requerido',
            'no_empleado.required' => 'El campo NO_EMPLEADO es requerido',
            'area.required' => 'El campo CVE_AREA es requerido',
            'usuario.required' => 'El campo USUARIO es requerido',
            'email.required' => 'El campo EMAIL es requerido',
            'password.required' => 'El campo PASSWORD es requerido',
            'curp.max' => 'El numero maximo de caracteres para el campo CURP es de 18',
            'rfc.max' => 'El numero maximo de caracteres para el campo RFC es de 13',
            'telefono.max' => 'El numero maximo de caracteres para el campo TELEFONO es de 10'
        ];
    }
}
