<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Empleado;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('empleados')->delete();
        $empleadoSuperadmin = Empleado::create(
            array (
                'user_id' => 1,
                'nombre' => 'administrador',
                'primer_apellido' => 'prueba',
                'segundo_apellido' => 'prueba',
                'created_user_id' => 1,
                'updated_user_id' => 1,
                'telefono' => '1234567890',
                'direccion' => 'direccion',
                'clave_empleado' => '01-SPADMIN',
                'created_at' => now(),
                'updated_at' => now()
            )
        );
    }
}
