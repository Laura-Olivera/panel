<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (

           
            1 => 
            array (
                'name' =>'Dashboard',
                'guard_name' =>'web',
                'descrip' => 'Entrar a dashboard administrador.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            2 => 
            array (
                'name' =>'SuperAdmin',
                'guard_name' =>'web',
                'descrip' => 'Todos los permisos.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            3 => 
            array (
                'name' =>'Admin',
                'guard_name' =>'web',
                'descrip' => 'Casi todos los permisos.',
                'created_at' => now(),
                'updated_at' => now(), 
            ),
            4 => 
            array (
                'name' =>'MenuUsuarios',
                'guard_name' =>'web',
                'descrip' => 'Menu de usuarios.',
                'created_at' => now(),
                'updated_at' => now(), 
            ), 
            5 => 
            array (
                'name' =>'MenuPermisos',
                'guard_name' =>'web',
                'descrip' => 'Menu de Permisos.',
                'created_at' => now(),
                'updated_at' => now(), 
            ), 
            6 => 
            array (
                'name' =>'MenuPerfiles',
                'guard_name' =>'web',
                'descrip' => 'Menu de perfiles.',
                'created_at' => now(),
                'updated_at' => now(), 
            ),
            7 => 
            array (
                'name' => 'PermisosCliente',
                'guard_name' => 'web',
                'descrip' => 'Permisos generales para clientes',
                'created_at' => now(),
                'updated_at' => now(),
            ), 
            8 =>
            array(
                'name' => 'MenuBitacoraUsuarios',
                'guard_name' => 'web',
                'descrip' => 'Menu de bitacora de usuarios',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            9 =>
            array(
                'name' => 'MenuBitacoraCliente',
                'guard_name' => 'web',
                'descrip' => 'Menu de bitacora declientes',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            10 =>
            array(
                'name' => 'MenuTareas',
                'guard_name' => 'web',
                'descrip' => 'Menu de tareas',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            11 =>
            array(
                'name' => 'MenuClientes',
                'guard_name' => 'web',
                'descrip' => 'Menu de clientes',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            12 =>
            array(
                'name' => 'MenuEmpresa',
                'guard_name' => 'web',
                'descrip' => 'Menu de empresa',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            13 =>
            array(
                'name' => 'MenuCatalogos',
                'guard_name' => 'web',
                'descrip' => 'Menu de catalogos',
                'created_at' => now(),
                'updated_at' => now(),
            )

        )); 
    }
}
