<?php

namespace App\Imports\Catalogos;

use App\Models\Catalogos\Proveedor;
use App\Services\Claves;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProveedoresImport implements ToModel, WithHeadingRow, SkipsEmptyRows, SkipsOnFailure, WithValidation
{
    use Importable, SkipsFailures;

    public function model(array $row)
    {
        
        $proveedor = Proveedor::create([
            'cve_prov' => $row['cve_proveedor'],
            'nombre' => $row['nombre'],
            'rfc' => $row['rfc'],
            'telefono' => $row['telefono'],
            'extension' => $row['extension'],
            'direccion' => $row['direccion'],
            'email' => $row['email'],
            'estatus' => true,
            'created_user_id' => Auth::user()->id,
        ]);  
       // dd($proveedor);
        return $proveedor;
    }

    public function rules(): array
    {
        return [
            'cve_proveedor' => ['required', 'unique:proveedores,cve_prov'],
            'nombre' => ['required'],
            'rfc' => ['required', 'unique:proveedores,rfc'],
            'telefono' => ['required'],
            'email' => ['required'],
        ];
    }

    public function customValidationMessages()
    {
        return [
            'cve_proveedor.required' => 'El campo cve_proveedor es requerido',
            'cve_proveedor.unique' =>'La clave de proveedor debe ser unica',
            'nombre.required' => 'El campo nombre es requerido',
            'rfc.required' => 'El campo rfc es requerido',
            'rfc.unique' => 'EL rfc de proveedor debe ser unico',
            'telefono.required' => 'El campo telefono es requerido',
            'email.required' => 'El campo email es requerido',
        ];
    }

    public function prepareForValidation($data, $index)
    {

        $getClave = new Claves;
        $cve_proveedor = $getClave->generarClave('proveedores', 'cve_prov');
        $data['cve_proveedor'] = $data['cve_proveedor'] ?? $cve_proveedor;
        //dd($data);
        return $data;
    }
}
