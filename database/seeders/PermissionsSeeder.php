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
                'name' =>'SuperAdmin',
                'guard_name' =>'web',
                'descrip' => 'Todos los permisos.',
                'created_at' => now(),
                'updated_at' => now(),     
            ),
            2 => 
            array (
                'name' =>'Admin',
                'guard_name' =>'web',
                'descrip' => 'Casi todos los permisos.',
                'created_at' => now(),
                'updated_at' => now(), 
            ),
            3 => 
            array (
                'name' =>'MenuUsuarios',
                'guard_name' =>'web',
                'descrip' => 'Menu de usuarios.',
                'created_at' => now(),
                'updated_at' => now(), 
            ), 
            4 => 
            array (
                'name' =>'MenuPermisos',
                'guard_name' =>'web',
                'descrip' => 'Menu de Permisos.',
                'created_at' => now(),
                'updated_at' => now(), 
            ), 
            5 => 
            array (
                'name' =>'MenuPerfiles',
                'guard_name' =>'web',
                'descrip' => 'Menu de perfiles.',
                'created_at' => now(),
                'updated_at' => now(), 
            ),
            6 => 
            array (
                'name' => 'PermisosCliente',
                'guard_name' => 'web',
                'descrip' => 'Permisos generales para clientes',
                'created_at' => now(),
                'updated_at' => now(),
            )
        )); 
    }
}
