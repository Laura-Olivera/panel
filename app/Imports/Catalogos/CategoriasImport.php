<?php

namespace App\Imports\Catalogos;

use App\Models\Catalogos\Categoria;
use App\Services\Claves;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CategoriasImport implements ToModel, WithHeadingRow, SkipsEmptyRows, SkipsOnFailure, WithValidation
{
    use Importable, SkipsFailures;

    public function model(array $row)
    {
        $categoria = Categoria::create([
            'nombre' => $row['nombre'],
            'cve_cat' => $row['cve_categoria'],
            'estatus' => true,
            'created_user_id' => Auth::user()->id,
        ]);

        return $categoria;
    }

    public function rules(): array
    {
        return [
            'cve_categoria' => ['required', 'unique:categorias,cve_cat'],
            'nombre' => ['required', 'unique:categorias,nombre'],
        ];
    }

    public function customValidationMessages()
    {
        return [
            'cve_categoria.required' => 'La clave de la categoria es requerido',
            'cve_categoria.unique' => 'La clave de la categoria debe ser unica',
            'nombre.required' => 'El nombre de la categoria es requerido',
            'nombre.unique' => 'El nombre de la categoria debe ser unico'
        ];
    }

    public function prepareForValidation($data, $index)
    {

        $getClave = new Claves;
        $cve_cat = $getClave->generarClave('categorias', 'cve_cat');
        $data['cve_categoria'] = $data['cve_categoria'] ?? $cve_cat;
        
        return $data;
    }
}
