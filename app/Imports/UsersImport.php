<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToCollection, WithHeadingRow, WithValidation, SkipsEmptyRows 
{

    use Importable;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            
            User::create([
                'nombre' => $row['nombre'],
                'primer_apellido' => $row['primer_apellido'],
                'segundo_apellido' => $row['segundo_apellido'],
                'curp' => $row['curp'],
                'rfc' => $row['rfc'],
                'cve_usuario' => $row['cve_usuario'],
                'telefono' => $row['telefono'],
                'area' => $row['area'],
                'usuario' => $row['usuario'],
                'email' => $row['email'],
                'password' => Hash::make($row['password']),
                'cambiar_password' => true,
                'estatus' => true,
                'intentos' => 0
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required',
            'primer_apellido' => 'required',
            'cve_usuario' => ['required', 'unique:users,cve_usuario'],
            'area' => 'required',
            'usuario' => ['required', 'unique:users,usuario'],
            'email' => 'required',
            'password' => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'usuario.unique' => 'El nombre de usuario debe ser unico',
            'cve_usuario.unique' => 'La clave de usuario debe ser unico',
            'nombre.required' => 'El campo nombre es requerido',
            'primer_apellido.required' => 'El campo primer_apellido es requerido',
            'cve_usuario.required' => 'El campo cve_usuario es requerido',
            'area.required' => 'El campo area es requerido',
            'usuario.required' => 'El campo usuario es requerido',
            'email.required' => 'El campo email es requerido',
            'password.required' => 'El campo password es requerido',
        ];
    }
}
