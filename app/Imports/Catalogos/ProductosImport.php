<?php

namespace App\Imports\Catalogos;

use App\Models\Catalogos\Categoria;
use App\Models\Catalogos\Producto;
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

class ProductosImport implements ToModel, WithHeadingRow, SkipsEmptyRows, SkipsOnFailure, WithValidation
{
    use Importable, SkipsFailures;

    public function model(array $row)
    {
        $producto = Producto::create([
            'nombre' => $row['nombre'],
            'modelo' => $row['modelo'],
            'marca' => $row['marca'],
            'proveedor_id' => $row['cve_proveedor'],
            'codigo' => $row['codigo_producto'],
            'precio_compra' => $row['precio_compra'],
            'precio_venta' => $row['precio_venta'],
            'cantidad' => $row['cantidad'],
            'categoria_id' => $row['cve_categoria'],
            'estatus' => true,
            'created_user_id' => Auth::user()->id
        ]);

        return $producto;
    }

    public function rules(): array
    {
        return [
            'nombre' => ['required'],
            'cve_proveedor' => ['required'],
            'codigo_producto' => ['required', 'unique:productos,codigo'],
            'precio_compra' => ['required'],
            'precio_venta' => ['required'],
            'cantidad' => ['required'],
            'cve_categoria' => ['required'],
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nombre.required' => 'El campo nombre es requerido.',
            'cve_proveedor.required' => 'El campo proveedor es requerido.',
            'codigo_producto.required' => 'El campo codigo_producto es requerido.',
            'codigo_producto.unique' => 'El codigo de producto debe ser unico.',
            'precio_compra.required' => 'El campo precio_compra es requerido.',
            'precio_venta.required' => 'El campo precio_venta es requerido.',
            'cantidad.required' => 'El campo cantidad es requerido.',
            'cve_categoria.required' => 'El campo categoria es requerido.',
        ];
    }

    public function prepareForValidation($data, $index)
    {

        $getClave = new Claves;
        $codigo_producto = $getClave->generarClave('productos', 'codigo');
        $data['codigo_producto'] = $data['codigo_producto'] ?? $codigo_producto;

        $prov = substr($data['cve_proveedor'], 0, 10);
        $proveedor = Proveedor::where('cve_prov', '=', $prov)->first();
        $data['cve_proveedor'] = (!empty($proveedor)) ? $proveedor->id : null;

        $categoria = Categoria::where('cve_cat', '=', $data['cve_categoria'])->first();
        $data['cve_categoria'] = (!empty($categoria)) ? $categoria->id : null;
        
        return $data;
    }
}
