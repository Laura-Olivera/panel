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
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithHeadingRow, SkipsEmptyRows, SkipsOnFailure, WithValidation
{

    use Importable, SkipsFailures;

    public function model(array $row)
    {
        $area = Area::where('cve_area', '=', $row['area'])->first();            
        $cve_area = (!empty($area)) ? $area->cve_area : 'AADP000001';
        $clave = new Claves;
        $no_empleado = ($row['no_empleado']) ? $row['no_empleado'] : $clave->generarClave('users', 'cve_usuario');

        $user = User::create([
            'nombre' => mb_strtoupper($row['nombre']),
            'primer_apellido' => mb_strtoupper($row['primer_apellido']),
            'segundo_apellido' => mb_strtoupper($row['segundo_apellido']),
            'curp' => mb_strtoupper($row['curp']),
            'rfc' => mb_strtoupper($row['rfc']),
            'cve_usuario' => $no_empleado,
            'telefono' => $row['telefono'],
            'area' => $cve_area,
            'usuario' => mb_strtolower($row['usuario']),
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

        return $user;
    }

    public function rules(): array
    {
        return [
            'no_empleado' => ['required', 'unique:users,cve_usuario'],
            'usuario' => ['required', 'unique:users,usuario'],
            'nombre' => ['required'],
            'primer_apellido' => ['required'],
            'curp' => ['size:18'],
            'rfc' => ['size:13'],
            'telefono' => ['size:10'],
            'area' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
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
            'curp.size' => 'El numero de caracteres para el campo CURP es de 18',
            'rfc.size' => 'El numero de caracteres para el campo RFC es de 13',
            'telefono.size' => 'El numero de caracteres para el campo TELEFONO es de 10'
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
