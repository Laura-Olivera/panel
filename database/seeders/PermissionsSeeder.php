<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();
        
        DB::table('permissions')->insert(array (

            1 => 
            array (
                'name' =>'SuperAdmin',
                'guard_name' =>'web',
                'descrip' => 'Todos los permisos.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            2 => 
            array (
                'name' =>'MenuUsuarios',
                'guard_name' =>'web',
                'descrip' => 'Menu de usuario.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            3 => 
            array (
                'name' =>'MenuPerfiles',
                'guard_name' =>'web',
                'descrip' => 'Menu de perfiles.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            4 => 
            array (
                'name' =>'MenuPermisos',
                'guard_name' =>'web',
                'descrip' => 'Menu de permisos.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            5 => 
            array (
                'name' =>'CatalogoAreas',
                'guard_name' =>'web',
                'descrip' => 'Catalogo de areas.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            6 => 
            array (
                'name' =>'CatalogoCategorias',
                'guard_name' =>'web',
                'descrip' => 'Catalogo de categorias.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            7 => 
            array (
                'name' =>'CatalogoProveedores',
                'guard_name' =>'web',
                'descrip' => 'Catalogo de proveedores.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            8 => 
            array (
                'name' =>'CatalogoProductos',
                'guard_name' =>'web',
                'descrip' => 'Catalogo de productos.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            9 => 
            array (
                'name' =>'MenuEntradas',
                'guard_name' =>'web',
                'descrip' => 'Menu de inventario entradas.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            10 =>
            array (
                'name' =>'CrearEntrada',
                'guard_name' =>'web',
                'descrip' => 'Crear nueva entrada en inventario.',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            11 =>
            array (
                'name' =>'EditarEntrada',
                'guard_name' =>'web',
                'descrip' => 'Editar entrada de inventario.',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            12 =>
            array (
                'name' =>'EliminarEntrada',
                'guard_name' =>'web',
                'descrip' => 'Eliminar entrada en inventario.',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            13 =>
            array (
                'name' =>'CrearAnexoEntrada',
                'guard_name' =>'web',
                'descrip' => 'Crear nuevo anexo de entrada en inventario.',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            14 =>
            array (
                'name' =>'EditarAnexoEntrada',
                'guard_name' =>'web',
                'descrip' => 'Editar anexo de entrada en inventario.',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            15 =>
            array (
                'name' =>'EliminarAnexoEntrada',
                'guard_name' =>'web',
                'descrip' => 'Eliminar anexo de entrada en inventario.',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            16 =>
            array (
                'name' =>'CrearProductoEntrada',
                'guard_name' =>'web',
                'descrip' => 'Agregar producto a entrada en inventario.',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            17 =>
            array (
                'name' =>'EditarProductoEntrada',
                'guard_name' =>'web',
                'descrip' => 'Editar producto de entrada en inventario.',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            18 =>
            array (
                'name' =>'EliminarProductoEntrada',
                'guard_name' =>'web',
                'descrip' => 'EliminarProducto de entrada en inventario.',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            19 => 
            array (
                'name' =>'MenuSalidas',
                'guard_name' =>'web',
                'descrip' => 'Menu de inventario salidas.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            20 => 
            array (
                'name' =>'CatalogoClientes',
                'guard_name' =>'web',
                'descrip' => 'Catalogo de clientes.',
                'created_at' => now(),
                'updated_at' => now(),     
            )

        )); 
    }
}
