<?php

namespace App\Imports;

use App\Models\Catalogos\Area;
use App\Models\User;
use App\Services\Claves;
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
            $user = User::create([
                'nombre' => $row['nombre'],
                'primer_apellido' => $row['primer_apellido'],
                'segundo_apellido' => $row['segundo_apellido'],
                'curp' => $row['curp'],
                'rfc' => $row['rfc'],
                'cve_usuario' => $row['no_empleado'],
                'telefono' => $row['telefono'],
                'area' => $row['area'],
                'usuario' => $row['usuario'],
                'email' => $row['email'],
                'password' => Hash::make($row['password']),
                'cambiar_password' => true,
                'estatus' => true,
                'intentos' => 0
            ]);

            $user->assignRole($row['perfil']);
            
        }
    }

    public function rules(): array
    {
        return [
            'no_empleado' => ['required', 'unique:users,cve_usuario'],
            'usuario' => ['required', 'unique:users,usuario'],
            'nombre' => 'required',
            'primer_apellido' => 'required',
            'curp' => ['max:18'],
            'rfc' => ['max:13'],
            'telefono' => ['max:10'],
            'area' => 'required',
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

    public function prepareForValidation($data, $index)
    {
        $area = Area::where('cve_area', '=', $data['area'])->first();            
        $cve_area = (!empty($area)) ? $area->cve_area : 'AADP000001';
        $data['area'] = $cve_area;

        $rol = DB::table('roles')->where('name', '=', $data['perfil'])->first();
        $data['perfil'] = (!empty($rol)) ? $rol->name : 'InventarioConsulta';

        $clave = new Claves;

        $data['no_empleado'] = $data['no_empleado'] ?? $clave->generarClave('users', 'cve_usuario');
        $data['usuario'] = $data['usuario'] ?? $clave->generarClave('users', 'usuario');
        
        return $data;
    }

}
