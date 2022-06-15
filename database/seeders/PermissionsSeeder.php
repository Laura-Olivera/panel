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
            )

        )); 
    }
}
