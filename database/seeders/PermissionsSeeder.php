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
                'name' =>'CatalogoAreasCrear',
                'guard_name' =>'web',
                'descrip' => 'Crear nueva area en catalogo areas.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            7 => 
            array (
                'name' =>'CatalogoAreasEditar',
                'guard_name' =>'web',
                'descrip' => 'Editar area en catalogo areas.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            8 => 
            array (
                'name' =>'CatalogoCategorias',
                'guard_name' =>'web',
                'descrip' => 'Catalogo de categorias.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            9 => 
            array (
                'name' =>'CatalogoCategoriasCrear',
                'guard_name' =>'web',
                'descrip' => 'Crear nueva categoria en catalogo categorias.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            10 => 
            array (
                'name' =>'CatalogoCategoriasEditar',
                'guard_name' =>'web',
                'descrip' => 'Editar categoria en catalogo categorias.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            11 => 
            array (
                'name' =>'CatalogoProveedores',
                'guard_name' =>'web',
                'descrip' => 'Catalogo de proveedores.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            12 => 
            array (
                'name' =>'CatalogoProveedoresCrear',
                'guard_name' =>'web',
                'descrip' => 'Crear nuevo proveedor en catalogo proveedores.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            13 => 
            array (
                'name' =>'CatalogoProveedoresEditar',
                'guard_name' =>'web',
                'descrip' => 'Editar proveedor en catalogo proveedores.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            14 => 
            array (
                'name' =>'CatalogoProductos',
                'guard_name' =>'web',
                'descrip' => 'Catalogo de productos.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            15 => 
            array (
                'name' =>'CatalogoProductosCrear',
                'guard_name' =>'web',
                'descrip' => 'Crear nuevo producto en catalogo productos.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            16 => 
            array (
                'name' =>'CatalogoProductosEditar',
                'guard_name' =>'web',
                'descrip' => 'Editar producto en catalogo productos.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            17 => 
            array (
                'name' =>'MenuEntradas',
                'guard_name' =>'web',
                'descrip' => 'Menu de inventario entradas.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            18 =>
            array (
                'name' =>'CrearEntrada',
                'guard_name' =>'web',
                'descrip' => 'Crear nueva entrada en inventario.',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            19 =>
            array (
                'name' =>'EditarEntrada',
                'guard_name' =>'web',
                'descrip' => 'Editar entrada de inventario.',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            20 =>
            array (
                'name' =>'EliminarEntrada',
                'guard_name' =>'web',
                'descrip' => 'Eliminar entrada en inventario.',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            21 =>
            array (
                'name' =>'CrearAnexoEntrada',
                'guard_name' =>'web',
                'descrip' => 'Crear nuevo anexo de entrada en inventario.',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            22 =>
            array (
                'name' =>'EditarAnexoEntrada',
                'guard_name' =>'web',
                'descrip' => 'Editar anexo de entrada en inventario.',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            23 =>
            array (
                'name' =>'EliminarAnexoEntrada',
                'guard_name' =>'web',
                'descrip' => 'Eliminar anexo de entrada en inventario.',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            24 =>
            array (
                'name' =>'CrearProductoEntrada',
                'guard_name' =>'web',
                'descrip' => 'Agregar producto a entrada en inventario.',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            25 =>
            array (
                'name' =>'EditarProductoEntrada',
                'guard_name' =>'web',
                'descrip' => 'Editar producto de entrada en inventario.',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            26 =>
            array (
                'name' =>'EliminarProductoEntrada',
                'guard_name' =>'web',
                'descrip' => 'Eliminar Producto de entrada en inventario.',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            27 => 
            array (
                'name' =>'MenuSalidas',
                'guard_name' =>'web',
                'descrip' => 'Menu de inventario salidas.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            28 => 
            array (
                'name' =>'CatalogoClientes',
                'guard_name' =>'web',
                'descrip' => 'Catalogo de clientes.',
                'created_at' => now(),
               'updated_at' => now(),     
            ),
            29 => 
            array (
                'name' =>'CatalogoClientesCrear',
                'guard_name' =>'web',
                'descrip' => 'Crear nuevo cliente en catalogo clientes.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            30 => 
            array (
                'name' =>'CatalogoClientesEditar',
                'guard_name' =>'web',
                'descrip' => 'Editar cliente en catalogo clientes.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            31 => 
            array (
                'name' =>'ReportesInventario',
                'guard_name' =>'web',
                'descrip' => 'Generar reportes de control de inventario.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),

        )); 
    }
}
