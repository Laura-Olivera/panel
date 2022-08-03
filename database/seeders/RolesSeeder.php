<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        $role_superadmin = Role::create([
            'name' => 'SuperAdmin',
            'guard_name' =>'web',
            'descrip' => 'Perfil con privilegios de súper administrador.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $role_admin = Role::create([
            'name' => 'Admin',
            'guard_name' =>'web',
            'descrip' => 'Perfil con privilegios de administrador general.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $role_inventario = Role::create([
            'name' => 'Inventario',
            'guard_name' =>'web',
            'descrip' => 'Perfil con privilegios de control de inventario.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $role_inventario_registro = Role::create([
            'name' => 'InventarioRegistrador',
            'guard_name' =>'web',
            'descrip' => 'Perfil con privilegios de registrador de inventario.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $role_inventario_consulta = Role::create([
            'name' => 'InventarioConsulta',
            'guard_name' =>'web',
            'descrip' => 'Perfil con privilegios de consulta de inventario.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $role_superadmin->givePermissionTo([
            'SuperAdmin',
            'MenuUsuarios',
            'MenuPerfiles',
            'MenuPermisos',
            'CatalogoAreas',
            'CatalogoAreasCrear',
            'CatalogoAreasEditar',
            'CatalogoCategorias',
            'CatalogoCategoriasCrear',
            'CatalogoCategoriasEditar',
            'CatalogoProveedores',
            'CatalogoProveedoresCrear',
            'CatalogoProveedoresEditar',
            'CatalogoProductos',
            'CatalogoProductosCrear',
            'CatalogoProductosEditar',
            'MenuEntradas',
            'CrearEntrada',
            'EditarEntrada',
            'EliminarEntrada',
            'CrearAnexoEntrada',
            'EditarAnexoEntrada',
            'EliminarAnexoEntrada',
            'CrearProductoEntrada',
            'EditarProductoEntrada',
            'EliminarProductoEntrada',
            'MenuSalidas',
            'CatalogoClientes',
            'CatalogoClientesCrear',
            'CatalogoClientesEditar',
            'ReportesInventario',
        ]);

        $role_admin->givePermissionTo([
            'MenuUsuarios',
            'CatalogoAreas',
            'CatalogoAreasCrear',
            'CatalogoAreasEditar',
            'CatalogoCategorias',
            'CatalogoCategoriasCrear',
            'CatalogoCategoriasEditar',
            'CatalogoProveedores',
            'CatalogoProveedoresCrear',
            'CatalogoProveedoresEditar',
            'CatalogoProductos',
            'CatalogoProductosCrear',
            'CatalogoProductosEditar',
            'MenuEntradas',
            'CrearEntrada',
            'EditarEntrada',
            'EliminarEntrada',
            'CrearAnexoEntrada',
            'EditarAnexoEntrada',
            'EliminarAnexoEntrada',
            'CrearProductoEntrada',
            'EditarProductoEntrada',
            'EliminarProductoEntrada',
            'MenuSalidas',
            'CatalogoClientes',
            'CatalogoClientesCrear',
            'CatalogoClientesEditar',
            'ReportesInventario',
        ]);

        $role_inventario->givePermissionTo([
            'CatalogoCategorias',
            'CatalogoCategoriasCrear',
            'CatalogoCategoriasEditar',
            'CatalogoProveedores',
            'CatalogoProveedoresCrear',
            'CatalogoProveedoresEditar',
            'CatalogoProductos',
            'CatalogoProductosCrear',
            'CatalogoProductosEditar',
            'MenuEntradas',
            'CrearEntrada',
            'EditarEntrada',
            'EliminarEntrada',
            'CrearAnexoEntrada',
            'EditarAnexoEntrada',
            'EliminarAnexoEntrada',
            'CrearProductoEntrada',
            'EditarProductoEntrada',
            'EliminarProductoEntrada',
            'MenuSalidas',
            'CatalogoClientes',
            'CatalogoClientesCrear',
            'CatalogoClientesEditar',
            'ReportesInventario',
        ]);

        $role_inventario_registro->givePermissionTo([
            'CatalogoCategorias',
            'CatalogoCategoriasCrear',
            'CatalogoCategoriasEditar',
            'CatalogoProveedores',
            'CatalogoProveedoresCrear',
            'CatalogoProveedoresEditar',
            'CatalogoProductos',
            'CatalogoProductosCrear',
            'CatalogoProductosEditar',
            'MenuEntradas',
            'CrearEntrada',
            'EditarEntrada',
            'CrearAnexoEntrada',
            'EditarAnexoEntrada',
            'CrearProductoEntrada',
            'EditarProductoEntrada',
            'EliminarProductoEntrada',
            'MenuSalidas',
            'CatalogoClientes',
            'CatalogoClientesCrear',
            'CatalogoClientesEditar',
            'ReportesInventario',
        ]);

        $role_inventario_consulta->givePermissionTo([
            'CatalogoCategorias',
            'CatalogoProveedores',
            'CatalogoProductos',
            'MenuEntradas',
            'MenuSalidas',
            'CatalogoClientes',
            'ReportesInventario',
        ]);
    }
}
